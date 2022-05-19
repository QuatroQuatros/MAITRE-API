<?php

namespace App\Http\Controllers\Api;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{

    public function  index(){
        return Horario::all();
    }


    public function store(Request $request){
        $request->validate([
            "abreAs" => 'required',
            "fechaAs" => 'required',
            "diasAberto" => 'required',
            "restaurante_id" => 'required'
        ]);


        $horario = Horario::create([
            "abreAs" => $request->abreAs,
            "fechaAs" => $request->fechaAs,
            "diasAberto" => $request->diasAberto,
            "restaurante_id" => $request->restaurante_id
        ]);

        return response()->json(["horario" => $horario], 201);
    }

    public function show($id){

    }
}
