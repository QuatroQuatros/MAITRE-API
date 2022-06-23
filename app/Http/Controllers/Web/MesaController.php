<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mesas;

class MesaController extends Controller
{

    public function create(){
        return view('dashboards.restaurante.mesas', ['mesas' => Mesas::all()]);
    }
    public function store(Request $request){
        return Mesas::create([
            'qtdMesas' => $request->qtd,
            'capMaxima' => $request->capacidade,
            'mesasDisponiveis' => $request->qtd,
            'restaurante_id' => $request->restaurante_id
        ]);
    }
}
