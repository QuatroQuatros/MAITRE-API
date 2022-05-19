<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurante;
use DB;

use App\Repositories\RestauranteRepository;

class UserController extends Controller
{
    public function store(Request $request){
        try{
            \DB::beginTransaction();
            $user = new User;
            $senha = Hash::make($request->password);
    
            $user->name = $request->nome;
            $user->email = $request->email;
            $user->password = $senha;
            $user->level = $request->level;
    
            $user->save();
            $id = $user->id;

            $request->merge(['user_id' => $id]);
            $request->merge(['categoria_id' => 1]);
            $request->merge(['estado' => $request->estado]);
    
            if($user->level == 1){
    
                $r = (new ClienteController)->store($request, $id);
                \DB::commit();
            }
            if($user->level == 2){
                $r = new RestauranteRepository(new Restaurante);
                $r->store($request);
                \DB::commit();
            }
        }catch(\Exception $e){
            \DB::rollback();
            throw $e;
        }
    }
}
