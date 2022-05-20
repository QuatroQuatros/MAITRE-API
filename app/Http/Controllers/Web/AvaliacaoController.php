<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;

use App\Models\Avaliacao;
use App\Repositories\AvaliacaoRepository;

class AvaliacaoController extends Controller
{
    public function __construct(Avaliacao $avaliacao){
        $this->avaliacao = $avaliacao;
        $this->avaliacaoRepository = new AvaliacaoRepository($this->avaliacao);
    }

    public function store(Request $request){
        $this->avaliacaoRepository->store($request);
        return Redirect::back();
    }

}
