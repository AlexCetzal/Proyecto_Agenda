<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ubicaciones extends Model
{
    use HasFactory;

    // Tabla asociada
    protected $table = 'ubicacion';

    // Atributos asignables en masa
    protected $fillable = [
        'edificio',
        'lugar',
        'aula',
    ];
}
