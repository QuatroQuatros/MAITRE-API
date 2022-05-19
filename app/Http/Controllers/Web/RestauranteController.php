<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('dashboards.restaurante.create');
    }

    public function show($id){
        return view('restaurantes.show', ['restaurante' => $this->restauranteRepository->show($id)]);
    }

    public function store(Request $request){
        $this->restauranteRepository->store($request);
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
