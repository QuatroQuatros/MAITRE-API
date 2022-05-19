<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'abreAs',
        'fechaAs',
        'diasAberto',
        'restaurante_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'diasAberto' => 'array',
        'restaurante_id' => 'integer',
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
