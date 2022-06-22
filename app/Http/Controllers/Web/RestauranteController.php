<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Redirect;

use App\Models\Categoria;
use App\Models\CategoriaRestaurante;
use App\Models\Restaurante;
use App\Models\Reserva;
use App\Models\Horario;
use App\Models\Prato;
use App\Models\PratoEspecial;
use App\Repositories\RestauranteRepository;


class RestauranteController extends Controller
{

    public function __construct(Restaurante $restaurante){
        $this->restaurante = $restaurante;
        $this->restauranteRepository = new RestauranteRepository($this->restaurante);
    }

    public function index(){
        return view('restaurantes.list', ['restaurantes' => Restaurante::join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id')->get(), 'categorias' => CategoriaRestaurante::all()]);
    }


    public function dash(){
        
        return view('dashboards.restaurante.index', ['name' => auth()->user()->name]);
    }

    public function create(){
        $categorias = CategoriaRestaurante::all();
        return view('auth.restaurante-register', ['categorias' => $categorias]);
    }

    public function show($id){
        //$horarios = Horario::where('restaurante_id', $id)->get();
        $horarios = Horario::select('horarios.id','horarios.horario', 'dia_semanas.diaSemana', 'dia_semanas.id as diaId')->distinct()->join('dia_semanas', 'dia_semanas.id', 'horarios.dia_semana_id')->where('restaurante_id', $id)->get();
        $avalicoes = $this->restaurante->select('avaliacoes.estrelas', 'avaliacoes.descAvaliacao', 'clientes.nome', 'clientes.foto')->join('avaliacoes', 'avaliacoes.restaurante_id', 'restaurantes.id')->join('clientes', 'clientes.user_id', 'avaliacoes.user_id')->where('avaliacoes.restaurante_id', $id)->get();
        $categorias = Prato::select('categorias.descCategoria')->join('categorias', 'categorias.id', 'pratos.categoria_id')->where('restaurante_id', $id)->distinct()->get();
        $pratos = Prato::select('pratos.categoria_id', 'pratos.nome', 'pratos.valor', 'pratos.descPrato',  'categorias.descCategoria')->join('categorias', 'pratos.categoria_id', 'categorias.id')->where('restaurante_id', $id)->distinct()->get();
        $especiais = PratoEspecial::select('pratos_especiais.categoria_id', 'dia_semanas.diaSemana', 'pratos_especiais.nome',  'pratos_especiais.valor', 'pratos_especiais.descPrato',  'categorias.descCategoria')->join('categorias', 'pratos_especiais.categoria_id', 'categorias.id')->join('dia_semanas', 'dia_semanas.id', 'pratos_especiais.dia_semana_id')
        ->orderBy('pratos_especiais.dia_semana_id')
        ->where('restaurante_id', $id)->get();
        return view('restaurantes.show', ['restaurante' => $this->restauranteRepository->show($id), 'avaliacoes' => $avalicoes, 'horarios' => $horarios, 'pratos' => $pratos, 'especiais' => $especiais, 'categorias' => $categorias]);
    }

    public function store(Request $request){
        $request->merge(['user_id' => auth()->user()->id]);
        return response($this->restauranteRepository->store($request));
        //return back()->withInput(['level' => 2]);
    }

    public function update(Request $request){
        $this->restauranteRepository->update($request);

    }

    public function reservas(){
        $reservas = Reserva::select('reservas.id','reservas.diaSemana', 'reservas.status_reserva_id', 'reservas.horario', 'clientes.nome', 'users.email')
        ->join('clientes', 'reservas.cliente_id', 'clientes.id')
        ->join('users', 'clientes.user_id', 'users.id')
        ->whereNull('duracao')->get();
        return view('dashboards.restaurante.reservas', ['reservas' => $reservas]);
    }

    public function buscar(Request $request){

        $busca = request('search');
        $filtros = $request->query();
        
        if($busca){
            if( $this->restaurante->where('nome', 'like', '%'.$busca.'%')->exists()){
                $restaurante = $this->restaurante->where('nome', 'like', '%'.$busca.'%')->get();
                return response()->json($restaurante, 200);

            }else if($this->restaurante->join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id')
            ->where('categoria_restaurantes.categoria','like', '%'.$busca.'%')->exists()){
                $restaurante = $this->restaurante->join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id')
                ->where('categoria_restaurantes.categoria','like', '%'.$busca.'%')->get();
                return response()->json($restaurante, 200);
            }else{
                return response()->noContent();
                
            }
            
        }else if($filtros['categoria']){
            return Restaurante::join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id') ->
            whereIn('categoria_restaurantes.categoria', $filtros['categoria'])->get();

            //return view('restaurantes.list', ['restaurantes' => $restaurantes, 'categorias' => CategoriaRestaurante::all()]);
        }else{
            return response()->json(['mensagem' => "produto não encontrado"], 204);
        }
        
    }

    public function teste(Request $request){
        $busca = $request->query();
        // if($busca['search']){
        //     return Restaurante::join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id') ->
        //     whereIn('categoria_restaurantes.categoria', $busca['search'])->get();
        // }




        return $busca;
    }
}
