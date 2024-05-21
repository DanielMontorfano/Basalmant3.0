<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrdenTrabajo;
use App\Models\Alarma;
use Carbon\Carbon;

class ChequeoDiario extends Command
{
    protected $signature = 'app:chequeo-diario';

    protected $description = 'Verifica las órdenes de trabajo vencidas y genera alarmas.';

    public function handle()
{
    // Vaciar la tabla de alarmas
    Alarma::truncate();

    $hoy = Carbon::now()->toDateString();

    // Obtener órdenes de trabajo vencidas con usuarios asignados
    $hoy = Carbon::now();
    
    $ordenesVencidas = OrdenTrabajo::where(function ($query) use ($hoy) {
            $query->whereDate('fechaNecesidad', '<', $hoy)
                  ->orWhereDate('fechaNecesidad', '=', $hoy);
        })
        ->where('estado', '!=', 'Cerrada')
        ->whereNotNull('asignadoA')
        ->get();
    
    foreach ($ordenesVencidas as $orden) {
        $alarma = new Alarma();
        $alarma->orden_trabajo_id = $orden->id;
        $alarma->solicitante = $orden->solicitante;
        $alarma->asignadoA = $orden->asignadoA;
        $alarma->prioridad = $orden->prioridad;	
        // Guardar el equipo en la base de datos
        $alarma->save();
        
        // Crear alarma para el usuario asignado
        /* Alarma::create([
            'user_id' => $orden->asignadoA->id,
            'titulo' => "Orden de trabajo vencida",
            'descripcion' => "La orden de trabajo {$orden->id} está vencida.",
            'fecha_hora_creacion' => Carbon::now(),
            'estado' => 'activo',
            'prioridad' => 'alta', // Ajusta la prioridad según tus necesidades
            'tipo' => 'Orden de trabajo',
            'fecha_hora_vencimiento' => $orden->fechaNecesidad,
            'responsable' => $orden->asignadoA->id
        ]);*/
    }

    $this->info('Chequeo diario completado.');
}

}
