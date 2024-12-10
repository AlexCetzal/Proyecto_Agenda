<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UbicacionesMontejos extends Model
{
    use HasFactory;

    protected $table = 'ubicacion_montejo';

    // Atributos asignables en masa
    protected $fillable = [
        'edificio',
        'lugar',
        'aula',
    ];
}
