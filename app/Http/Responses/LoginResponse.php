<?php
 
namespace App\Http\Responses;
 
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Models\User; 

use Carbon\Carbon;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $id = auth()->user()->id; 
        $user = User::findOrFail($id);
        $level = auth()->user()->level; 

        if (is_null($user->first_login_at) && $level == 2) {
            $user->first_login_at = Carbon::now();
            $user->last_login_at  = Carbon::now();
            $user->update();
            return redirect('/restaurantes/create');
        }elseif (is_null($user->first_login_at) && $level!= 2 ) {
            $user->first_login_at = Carbon::now();
            $user->last_login_at  = Carbon::now();
            $user->update();
       }

        if($level == 1){
            $user->last_login_at  = Carbon::now();
            $user->update();
            $home = '/';
        } 
        elseif($level == 2){
            $user->last_login_at  = Carbon::now();
            $user->update();
            $home = '/restaurantes/admin';
  
        }elseif($level == 3){
            $user->last_login_at  = Carbon::now();
            $user->update();
            $home = '/admin';
        }
        else{
            $home = '/error';
        }
        return redirect()->intended($home);
 
    }
}