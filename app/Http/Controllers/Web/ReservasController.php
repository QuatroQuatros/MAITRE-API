<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Reserva;

class ReservasController extends Controller
{
    public function store(Request $request){
        //dd(auth()->user()->id);
        //$c = Cliente::findOrFail(auth()->user()->id);
        $c = Cliente::select('id')->where('user_id', auth()->user()->id)->first();
        Reserva::create([
            'horario' => $request->horario,
            'data' => $request->data,
            'diaSemana' => $request->dia,
            'qtdPessoas' => $request->qtd,
            'cliente_id' => $c->id,
            'restaurante_id' => $request->restId,
            'status_reserva_id' => 1,
        ]);

        return redirect()->back();
    }

    public function find($id){
        return Reserva::select('reservas.id','dia_semanas.diaSemana', 'reservas.horario', 'reservas.data', 'reservas.qtdPessoas', 'clientes.nome', 'users.email')
        ->join('clientes', 'reservas.cliente_id', 'clientes.id')
        ->join('users', 'clientes.user_id', 'users.id')
        ->join('dia_semanas', 'dia_semanas.id', 'reservas.diaSemana')
        ->where('reservas.id', $id)->first();
    }

    public function rejeitar(Request $request, $id){
        $r = Reserva::findOrFail($id);
        $r->status_reserva_id = $request->status_reserva_id;
        $r->save();
        return $r;
    }
    
    public function aprovar(Request $request, $id){
        $r = Reserva::findOrFail($id);
        $r->status_reserva_id = $request->status_reserva_id;
        $r->save();
        $reservas = Reserva::select('reservas.id','reservas.diaSemana', 'reservas.status_reserva_id', 'reservas.horario', 'clientes.nome', 'users.email')
        ->join('clientes', 'reservas.cliente_id', 'clientes.id')
        ->join('users', 'clientes.user_id', 'users.id')
        ->get();
        return view('dashboards.restaurante.reservas', ['reservas' => $reservas]);
    }

}
