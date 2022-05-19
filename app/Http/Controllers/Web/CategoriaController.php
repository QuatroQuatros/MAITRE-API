<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Categoria;

use App\Repositories\CategoriaRepository;

class CategoriaController extends Controller
{

    public function __construct(Categoria $categoria){
        $this->categoria = $categoria;
        $this->categoriaRepository = new CategoriaRepository($this->categoria);
    }

    public function index_response(){
        $categorias = $this->categoria->all();
        return view('dashboards.admin.categoria.create', ['categorias' => $categorias]);
    }

    public function create(){
        return $this->index_response();
    }

    public function store(Request $request){
        $this->categoriaRepository->store($request);

        return $this->index_response();
    }
    public function destroy($id){
        $this->categoriaRepository->destroy($id);
        return $this->index_response();
    }
}
