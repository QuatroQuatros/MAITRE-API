<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Avaliacao;
use App\Repositories\AvaliacaoRepository;

class AvaliacaoController extends Controller
{
    public function __construct(Avaliacao $avaliacao){
        $this->avaliacao = $avaliacao;
        $this->avaliacaoRepository = new AvaliacaoRepository($this->avaliacao);
        
    }

    public function store(Request $request){
        return response($this->avaliacaoRepository->store($request), 201);

    }
}
