<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaRestaurante;

class CategoriaRestauranteController extends Controller
{
    public function store(Request $request){
        CategoriaRestaurante::create([
            'categoria' => $request->categoria,
        ]);

        // return redirect('/restaurantes/create')->withInput();
    }
}
