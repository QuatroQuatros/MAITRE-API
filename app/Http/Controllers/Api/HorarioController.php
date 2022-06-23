<?php

namespace App\Http\Controllers\Api;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function __construct(Horario $horario){
        $this->horario = $horario;
    }

    public function  index(){
        return Horario::all();
    }


    public function store(Request $request){  
        $request->validate($this->horario->rules(), $this->horario->feedback());

        return response($this->horario->create([
            "dia_semana_id" => $request->dia_semana_id,
            "horario" => $request->horario,
            "restaurante_id" => $request->restaurante_id,
        ]));
    }

    public function show($id){
        return response()->json(['horarios' => $this->horario->where('dia_semana_id', $id)->get()]);
    }
}
