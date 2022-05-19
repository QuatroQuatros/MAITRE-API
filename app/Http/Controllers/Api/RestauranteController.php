<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurante;
use Illuminate\Http\Request;

use App\Repositories\RestauranteRepository;



class RestauranteController extends Controller
{

    public function __construct(Restaurante $restaurante){
        $this->restaurante = $restaurante;
        $this->restauranteRepository = new RestauranteRepository($this->restaurante);
    }

    public function index(){
        return response()->json(["restaurantes" => $this->restauranteRepository->index()], 200);
        //return response()->json(["restaurantes" => Restaurante::all()]);
    }

    public function show($id){
        //$restaurante = Restaurante::findOrFail($id);
        return response()->json(["restaurante" => $this->restauranteRepository->show($id)], 200);
    }

    public function store(Request $request){
        return response($this->restauranteRepository->store($request), 201);

    }

    public function update(Request $request, $id){
        return response($this->restauranteRepository->update($request, $id), 202);
    }




}
