<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    use HasFactory;

    protected $table = 'mesas';
    protected $fillable = [
        'qtdMesas',
        'capMaxima',
        'mesasDisponiveis',
        'restaurante_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'restaurante_id' => 'integer',
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
