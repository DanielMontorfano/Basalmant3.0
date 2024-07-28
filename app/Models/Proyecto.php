<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'created_at',
        'updated_at',	

    ];

    /**
     * Obtener las tareas para el proyecto.
     */
    public function ptareas()
    {
        return $this->hasMany(Ptarea::class);
    }
}
