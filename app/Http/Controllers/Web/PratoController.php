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
        $rest = Restaurante::where('user_id', \Auth::user()->id)->first();
       
        $id = $rest->id;
        return view('dashboards.restaurante.cardapio', ['pratos' => Prato::where('restaurante_id', $id)->get(), 'categorias' => Categoria::all()]);
    }

   
    public function create()
    {
        
        return $this->index();
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

        return $this->index();
    }


}
