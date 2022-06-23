<?php


namespace App\Repositories;
use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model;

use App\Models\Restaurante;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class RestauranteRepository{

    public function __construct(Restaurante $restaurante){
        $this->restaurante = $restaurante;
    }
    public function index(){
        
        return $this->restaurante->leftJoin('avaliacoes', 'restaurantes.id', 'avaliacoes.restaurante_id')
        ->select('restaurantes.id', 'restaurantes.nome', 'restaurantes.foto', 'restaurantes.level', DB::raw( 'AVG( avaliacoes.estrelas ) as estrelas' ))
        ->groupBy('restaurantes.id', 'restaurantes.nome','restaurantes.foto', 'restaurantes.level')->get();
        //return $this->restaurante->all();

    }
    public function show($id){
        //$this->restaurante = $this->restaurante->findOrFail($id);
        
        return $this->restaurante->leftJoin('avaliacoes', 'restaurantes.id', 'avaliacoes.restaurante_id')
        ->select('restaurantes.id', 'restaurantes.nome', 'restaurantes.foto', DB::raw( 'AVG( avaliacoes.estrelas ) as estrelas' ))
        ->groupBy('restaurantes.id', 'restaurantes.nome','restaurantes.foto')->where('restaurantes.id', $id)->first();
        //return $this->restaurante->findOrFail($id);

    }

    public function store(Request $request){
        $request->validate($this->restaurante->rules(), $this->restaurante->feedback());    
        $imagem = $request->file('foto');
        $name = $imagem->getClientOriginalName(); 
        $path = $imagem->storeAs('imagens', $name, 'public');

        //dd($imagem);
        //$path = $imagem->storeAs('imagens', $imagem, 's3');


        //$path = $request->file('foto')->store('./imagens/', 's3');


        // $path = Storage::disk('s3')->put('imagens', $imagem, 'public');
        // Storage::disk('s3')->setVisibility($path, 'public');
       
        
        return $this->restaurante->create([
            "nome" => $request->nome,
            "endereco" => $request->endereco,
            "numero" => $request->numero,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "estado" =>  $request->estado,
            // "foto" => Storage::disk('s3')->url($path),
            "foto" => $path,
            "cep" =>  $request->cep,
            "level" => $request->level,
            "categoria_restaurante_id" => $request->categoria_restaurante_id,
            "user_id" => $request->user_id
        ]);

    }

    public function update(Request $request, $id){
        $this->restaurante = $this->restaurante->findOrFail($id);
        //$request->validate($this->restaurante->rules(), $this->restaurante->feedback());


        // if($request->has('foto')){
        //     $imagem = $request->file('foto');
        //     $name = $imagem->getClientOriginalName(); 
        //     $imagem_urn = $imagem->storeAs('imagens', $name, 'public');
        //     $this->restaurante->update([
        //         "foto" => $imagem_urn,
        //     ]);
        // }
        
       
        $this->restaurante->update([
            "nome" => $request->nome,
            "endereco" => $request->endereco,
            "numero" => $request->numero,
            "bairro" => $request->bairro,
            "cidade" => $request->cidade,
            "estado" =>  $request->estado,
            "cep" =>  $request->cep,
            "categoria_id" => $request->categoria_id,
        ]);

        return $this->restaurante;


    }

    public function destroy($id){
        $this->restaurante->destroy($id);

    }

    public function restore($id){
        return $this->restaurante->where('id', $id)->withTrashed()->restore();

    }

    public function standard(){
        return $this->restaurante->leftJoin('avaliacoes', 'restaurantes.id', 'avaliacoes.restaurante_id')
        ->select('restaurantes.id', 'restaurantes.nome', 'restaurantes.foto', 'restaurantes.level', DB::raw( 'AVG( avaliacoes.estrelas ) as estrelas' ))
        ->groupBy('restaurantes.id', 'restaurantes.nome','restaurantes.foto', 'restaurantes.level')->where('restaurantes.level', 1)->get();
    }

    public function premium(){
        return $this->restaurante->leftJoin('avaliacoes', 'restaurantes.id', 'avaliacoes.restaurante_id')
        ->select('restaurantes.id', 'restaurantes.nome', 'restaurantes.foto', 'restaurantes.level', DB::raw( 'AVG( avaliacoes.estrelas ) as estrelas' ))
        ->groupBy('restaurantes.id', 'restaurantes.nome','restaurantes.foto', 'restaurantes.level')->where('restaurantes.level', 2)->get();

    }



    public function getPremium($id){
        $this->restaurante = $this->restaurante->findOrFail($id);

        if($this->restaurante->level == 1){
            $this->restaurante->level = 2;
            return $this->restaurante->save();
        }else{
            return "Este restauranta já possuí o plano Premium";
        }
    }

    public function cancelPremium($id){
        $this->restaurante = $this->restaurante->findOrFail($id);

        if($this->restaurante->level == 2){
            $this->restaurante->level = 1;
            return $this->restaurante->save();
        }else{
            return "Este restauranta não possuí o plano premium";
        }

    }




}