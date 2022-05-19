<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(){
        return Cliente::all();
    }

    public function show($id){
        $cliente = Cliente::findOrFail($id);
        return response($cliente, 200);
    }

    public function store(Request $request){
        $request->validate([
            "nome" => 'required|string',
            "cpf" => 'required|string|unique:clientes',
            "endereco" => 'required|string',
            "numero" => 'required|integer',
            "bairro" => 'required|string',
            "cidade" => 'required|string',
            "estado" => 'required|string',
            "cep" => 'required|string',
            "user_id" => 'required|integer'
        ]);

        $cliente = Cliente::create([
            "nome" => $request->nome,
            "cpf" => $request->cpf,
            "endereco" => $request->endereco,
            "numero" => $request->numero,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "estado" =>  $request->estado,
            "cep" =>  $request->cep,
            "user_id" => $request->user_id
        ]);

        return response($cliente, 201);


    }

    public function update(Request $request, $id){
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            "nome" => 'required|string',
            "endereco" => 'required|string',
            "numero" => 'required|integer',
            "bairro" => 'required|string',
            "cidade" => 'required|string',
            "estado" => 'required|string',
            "cep" => 'required|string',
        ]);


        $cliente->update([
            "nome" => $request->nome,
            "endereco" => $request->endereco,
            "numero" => $request->numero,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "estado" =>  $request->estado,
            "cep" =>  $request->cep,
        ]);

        return response($cliente, 202);
    }
}
