<?php
 
namespace App\Http\Responses;
 
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
 
class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $level = auth()->user()->level; 

        if($level == 1){
            $home = '/';
        } 
        elseif($level == 2){
            $home = '/restaurantes/admin';
        }elseif($level == 3){
            $home = '/admin';
        }
        else{
            $home = '/error';
        }
        return redirect()->intended($home);
 
    }
}