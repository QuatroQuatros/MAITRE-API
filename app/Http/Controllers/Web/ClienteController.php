<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        $restaurantes = Restaurante::all();
        return view('welcome', ['restaurantes' => $restaurantes]);
    }

    public function store(Request $request, $id){
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->endereco = $request->endereco;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        $cliente->numero = $request->num;

        //$user = auth()->user();
        //$cliente->user_id = $user->id;
        $cliente->user_id = $id;
        $cliente->save();
    }
}
