<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Prato;
use App\Models\Restaurante;

class PratoController extends Controller
{
  
    public function index()
    {
        //
    }

   
    public function create()
    {
        return view('dashboards.restaurante.cardapio', ['pratos' => Prato::all(), 'categorias' => Categoria::all()]);
    }

  
    public function store(Request $request)
    {
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;

        Prato::create([
            "nome" => $request->nome,
            "descPrato" => $request->descPrato,
            "valor" => $request->valor,
            "categoria_id" => $request->categoria_id,
            "restaurante_id" => $id
        ]);

        return view('dashboards.restaurante.cardapio', ['pratos' => Prato::all(),'categorias' => Categoria::all()]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
