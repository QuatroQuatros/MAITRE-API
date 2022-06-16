<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\User;

use App\Models\FoneCliente;

use App\Repositories\ClienteRepository;

class ClienteController extends Controller
{

    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
        $this->ClienteRepository = new ClienteRepository($this->cliente);
    }


    public function index(){
        $restaurantes = Restaurante::all();
        return view('welcome', ['restaurantes' => $restaurantes]);
    }

    public function store(Request $request, $id){
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->endereco = $request->endereco;
        $cliente->bairro = $request->bairro;
        $cliente->cidade = $request->cidade;
        $cliente->estado = $request->estado;
        $cliente->cep = $request->cep;
        $cliente->numero = $request->num;
        $cliente->user_id = $id;
        $cliente->save();

        $id = $cliente->id;

        FoneCliente::create([
            'descFone' => $request->fone,
            'cliente_id' => $id
        ]);


    }

    public function update(Request $request, $id){
        $this->ClienteRepository->update($request, $id);
        $reservas = Reserva::where('reservas.cliente_id', $id)->get();
        return view('clientes.profile', ['reservas' => $reservas, 'cliente' => User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first()]);
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        Cliente::where('user_id', $id)->first()->delete();
        return view('/login');
    }

    public function profile($id){
        $reservas = Reserva::where('reservas.cliente_id', $id)->get();
        return view('clientes.profile', ['reservas' => $reservas, 'cliente' => User::join('clientes', 'clientes.user_id', 'users.id')->where('user_id', $id)->first()]);
    }
}
