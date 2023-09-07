<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas'; // Especifica el nombre de la tabla si no sigue la convención de nombres de Laravel

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'asignado_a',
    ];
}
