<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'bairro',
        'cidade',
        'estado',
        'foto',
        'cardapio',
        'cep',
        'numero',
        'categoria_id',
        'user_id',
    ];

   
    protected $casts = [
        'id' => 'integer',
        'categoria_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rules(){
        return [
            "nome" => 'required|string',
            "endereco" => 'required|string',
            "numero" => 'required|integer',
            "bairro" => 'required|string',
            "cidade" => 'required|string',
            "estado" => 'required|string',
            "foto" => 'nullable|file|mimes:png,jpg,jpeg',
            "cep" => 'required|string',
            "categoria_id" => 'required|integer',
            "user_id" => 'required|integer',
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
        ];
    }
}
