<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservasController extends Controller
{
    public function update(Request $request, $id){
        $r = Reserva::findOrFail($id);

        $r->status_reserva_id = $request->status_reserva_id;
        return $r->save();
    
    }
}