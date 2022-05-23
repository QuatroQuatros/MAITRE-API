<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Redirect;

use App\Models\Restaurante;
use App\Repositories\RestauranteRepository;

class RestauranteController extends Controller
{

    public function __construct(Restaurante $restaurante){
        $this->restaurante = $restaurante;
        $this->restauranteRepository = new RestauranteRepository($this->restaurante);
    }

    public function index(){
        return view('restaurantes.list', ['restaurantes' => Restaurante::all()]);
    }


    public function dash(){
        
        return view('dashboards.restaurante.index', ['name' => auth()->user()->name]);
    }

    public function create(){
        return view('auth.restaurante-register');
    }

    public function show($id){
        $avalicoes = $this->restaurante->select('avaliacoes.estrelas', 'avaliacoes.descAvaliacao', 'clientes.nome', 'clientes.foto')->join('avaliacoes', 'avaliacoes.restaurante_id', 'restaurantes.id')->join('clientes', 'clientes.user_id', 'avaliacoes.user_id')->where('avaliacoes.restaurante_id', $id)->get();
        return view('restaurantes.show', ['restaurante' => $this->restauranteRepository->show($id), 'avaliacoes' => $avalicoes]);
    }

    public function store(Request $request){
        $request->merge(['user_id' => auth()->user()->id]);
        return response($this->restauranteRepository->store($request));
        //return back()->withInput(['level' => 2]);
    }

    public function update(Request $request){
        $this->restauranteRepository->update($request);

    }

    public function buscar(){

        $busca = request('search');
        
        if($busca){
            if( $this->restaurante->where('nome', 'like', '%'.$busca.'%')->exists()){
                $restaurante = $this->restaurante->where('nome', 'like', '%'.$busca.'%')->get();
                return response()->json($restaurante, 200);

            }else{
                return response()->noContent();
                
            }
            
        }else{
            return response()->json(['mensagem' => "produto não encontrado"], 204);
        }
        
    }
}
