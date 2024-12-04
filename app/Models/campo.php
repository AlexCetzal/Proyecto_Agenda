<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campo extends Model
{
    use HasFactory;
     // Tabla asociada
    protected $table = 'campos';

     // Atributos asignables en masa
    protected $fillable = [
        'lugar',
        'campo_cancha'
    ];
}
