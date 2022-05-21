<?php


namespace App\Repositories;
use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Avaliacao;

class AvaliacaoRepository{

    public function __construct(Avaliacao $avaliacao){
        $this->avaliacao = $avaliacao;
    }

    public function store(Request $request){
        $request->validate($this->avaliacao->rules(), $this->avaliacao->feedback());
        

        return $this->avaliacao->create([
            "estrelas" => $request->estrelas,
            "descAvaliacao" => $request->descAvaliacao,
            "restaurante_id" => $request->restaurante_id,
            "user_id" => $request->user_id,
        ]);
    }

}