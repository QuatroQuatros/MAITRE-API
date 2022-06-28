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
use App\Models\Mesas;
use App\Repositories\RestauranteRepository;

use App\Models\FotoRestaurante;

use DB;
use Carbon\Carbon;


class RestauranteController extends Controller
{

    public function __construct(Restaurante $restaurante){
        $this->restaurante = $restaurante;
        $this->restauranteRepository = new RestauranteRepository($this->restaurante);
    }

    public function index(){
        
        return view('restaurantes.list', ['restaurantes' => Restaurante::join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id')->get(), 'categorias' => CategoriaRestaurante::all()]);
    }

    public function home(){


        $rest = $this->restaurante->where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;

        $m = Mesas::select(DB::raw('COUNT(id) as id'))->where('restaurante_id', $id)->first();

        $n = Mesas::select(DB::raw('COUNT(id) as id'))->where('restaurante_id', $id)->where('disponivel', 1)->first();

        if($m->id != 0 && $n->id != 0){
            $mesasDisponiveis = $n->id/$m->id * 100;
        }else{
            $mesasDisponiveis = 0;
        }
        
        

        $reservasHoje = Reserva::select(DB::raw('COUNT(id) as id'))
        ->where('reservas.restaurante_id', $id)
        ->whereDate('created_at', '=', Carbon::today()->toDateString())->first();


        $reservas = Reserva::select('reservas.id','reservas.diaSemana', 'reservas.status_reserva_id', 'reservas.horario', 'clientes.nome', 'users.email')
        ->join('restaurantes', 'restaurantes.id', 'reservas.restaurante_id')
        ->join('clientes', 'reservas.cliente_id','clientes.id')
        ->join('users', 'restaurantes.user_id', 'users.id')
        
        ->where('users.id', \Auth::user()->id)
        ->orderBy('reservas.status_reserva_id', 'asc')
        ->get();

        
        $mesas = Mesas::where('restaurante_id', $id)->where('disponivel', 1)->get();
        return view('dashboards.restaurante.index', ['reservas' => $reservas, 'mesas' => $mesas, 'reservasHoje' => $reservasHoje, 'mesasDisponiveis' => $mesasDisponiveis]);
    }


    public function dash(){
        //SELECT diaSemana, count(*) as 'qtd' FROM `reservas` GROUP BY(diaSemana)
        $reservas = Reserva::select('diaSemana', DB::raw('COUNT(id) as total'))->groupBy('diaSemana')->get();
        return view('dashboards.restaurante.graficos', ['reservas' => $reservas]);
    }

    public function create(){
        return view('auth.restaurante-register', ['categorias' => CategoriaRestaurante::all()]);
    }

    public function show($id){
        //$horarios = Horario::where('restaurante_id', $id)->get();
       // $horarios = Horario::select('horarios.id','horarios.horario', 'dia_semanas.diaSemana', 'dia_semanas.id as diaId')->distinct()->join('dia_semanas', 'dia_semanas.id', 'horarios.dia_semana_id')->where('restaurante_id', $id)->get();
        $avalicoes = $this->restaurante->select('avaliacoes.estrelas', 'avaliacoes.descAvaliacao', 'clientes.nome', 'clientes.foto')->join('avaliacoes', 'avaliacoes.restaurante_id', 'restaurantes.id')->join('clientes', 'clientes.user_id', 'avaliacoes.user_id')->where('avaliacoes.restaurante_id', $id)->get();
        $categorias = Prato::select('categorias.descCategoria')->join('categorias', 'categorias.id', 'pratos.categoria_id')->where('restaurante_id', $id)->distinct()->get();
        $pratos = Prato::select('pratos.id','pratos.categoria_id', 'pratos.nome', 'pratos.valor', 'pratos.descPrato',  'categorias.descCategoria')->join('categorias', 'pratos.categoria_id', 'categorias.id')->where('restaurante_id', $id)->distinct()->get();
        $especiais = PratoEspecial::select('pratos_especiais.categoria_id', 'dia_semanas.diaSemana', 'pratos_especiais.nome',  'pratos_especiais.valor', 'pratos_especiais.descPrato',  'categorias.descCategoria')->join('categorias', 'pratos_especiais.categoria_id', 'categorias.id')->join('dia_semanas', 'dia_semanas.id', 'pratos_especiais.dia_semana_id')
        ->orderBy('pratos_especiais.dia_semana_id')
        ->where('restaurante_id', $id)->get();
        return view('restaurantes.show', ['restaurante' => $this->restauranteRepository->show($id), 'avaliacoes' => $avalicoes, 'pratos' => $pratos, 'especiais' => $especiais, 'categorias' => $categorias]);
    }

    public function store(Request $request){
        $request->merge(['user_id' => auth()->user()->id]);
        return response($this->restauranteRepository->store($request));
        //return back()->withInput(['level' => 2]);
    }

    public function edit($id){

        return view('dashboards.restaurante.edit', ['restaurante' => Restaurante::join('categoria_restaurantes', 'categoria_restaurantes.id', 'restaurantes.categoria_restaurante_id')->where('user_id', $id)->first(), 'categorias' => CategoriaRestaurante::all()]);
    }

    public function update(Request $request, $id){
        $this->restauranteRepository->update($request, $id);
        return view('dashboards.restaurante.edit', ['restaurante' => Restaurante::where('user_id', $id)->first()]);

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

    public function slides(){
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;
        return view('dashboards.restaurante.slides', ['slides' => FotoRestaurante::where('restaurante_id', $id)->get()]);
    }

    public function criarSlide(Request $request){
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;
        FotoRestaurante::create([
            "foto" => $request->foto,
            "descFoto" => $request->descFoto,
            "restaurante_id" => $id
        ]);

        return $this->slides();
    }

    public function atualizarSlide(Request $request){

        $slide = FotoRestaurante::findOrFail($request->slide_id);
        $slide->update($request->only('foto', 'descFoto'));
        $slide->save();
        return $this->slides();

    }

    public function apagarSlide($id){
        FotoRestaurante::destroy($id);
        return $this->slides();
        
    }


}
