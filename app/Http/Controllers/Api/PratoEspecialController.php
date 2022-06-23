<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PratoEspecial;

class PratoEspecialController extends Controller
{
    public function index()
    {
        return PratoEspecial::all();
    }

    public function store(Request $request)
    {
        return PratoEspecial::create([
            'nome' => $request->nome,
            'foto' => $request->foto,
            'descPrato' => $request->descPrato,
            'valor' => $request->valor,
            'categoria_id' => $request->categoria_id,
            'dia_semana_id' => $request->dia_semana_id,
            'restaurante_id' => $request->restaurante_id,
        ]);
    }

    public function show($id)
    {
        return PratoEspecial::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        return PratoEspecial::where('id', $id)->update($request->only('nome','foto','descPrato','valor', 'categoria_id', 'dia_semana_id'));
    }

  
    public function destroy($id)
    {
        return PratoEspecial::findOrFail($id)->delete();
    }
}
