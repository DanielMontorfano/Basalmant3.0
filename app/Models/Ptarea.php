<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'created_at',
        'updated_at',
    ];

    /**
     * Obtener el proyecto al que pertenece la tarea.
     */
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    /**
     * Obtener las subtareas para la tarea.
     */
    public function subtareas()
    {
        return $this->hasMany(Subtarea::class);
    }
}
