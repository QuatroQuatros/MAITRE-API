<?php


namespace App\Repositories;
use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteRepository{

	public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function store(Request $request){
        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        return $this->cliente->create([
            "nome" => $request->nome,
            "cpf" => $request->cpf,
            "endereco" => $request->endereco,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "estado" => $request->estado,
            "cep" => $request->cep,
            "numero" => $request->numero,
            "user_id" => $request->user_id
        ]);
    }

}

?>