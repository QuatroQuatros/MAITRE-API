<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prato;

class PratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Prato::all();
    }

    public function store(Request $request)
    {
        return Prato::create([
            'nome' => $request->nome,
            'descPrato' => $request->descPrato,
            'valor' => $request->valor,
            'categoria_id' => $request->categoria_id,
            'restaurante_id' => $request->restaurante_id,
        ]);
    }

    public function show($id)
    {
        return Prato::findOrFail($id);
    }


    public function update(Request $request, $id)
    {
        return Prato::where('id', $id)->update($request->only('nome','descPrato','valor'));
    }

  
    public function destroy($id)
    {
        return Prato::findOrFail($id)->delete();
    }
}