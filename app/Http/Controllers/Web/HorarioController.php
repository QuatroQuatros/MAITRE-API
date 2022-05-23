<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Horario;

class HorarioController extends Controller
{

    public function __construct(Horario $horario){
        $this->horario = $horario;
    }
    public function store(Request $request){
        $request->validate($this->horario->rules(), $this->horario->feedback());

        return response($this->horario->create([
            "dia_semana_id" => $request->dia_semana_id,
            "horario" => $request->horario,
            "restaurante_id" => $request->restaurante_id,
        ]));

    }
}
