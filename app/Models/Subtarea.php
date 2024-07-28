<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'ptarea_id',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'created_at',
        'updated_at',
    ];

    /**
     * Obtener la tarea a la que pertenece la subtarea.
     */
    public function ptarea()
    {
        return $this->belongsTo(Ptarea::class);
    }
}
