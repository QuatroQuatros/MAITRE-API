<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioDia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'diaSemana_id',
        'horario_id',
        'restaurante_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'diaSemana_id' => 'integer',
        'horario_id' => 'integer',
        'restaurante_id' => 'integer',
    ];

    public function diaSemana()
    {
        return $this->belongsTo(DiaSemana::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
