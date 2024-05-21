<?php

namespace App\Http\Controllers;

use App\Models\Alarma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Auth;
class AlarmaController extends Controller
{
    /**
     * Chequear alarmas y ejecutar el comando correspondiente.
     */
    public function chequearAlarmas()
    {
        // Invocar el comando de Artisan para chequear las alarmas
        Artisan::call('app:check-alarms');

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'El chequeo de alarmas se ha ejecutado correctamente.');
    }

    public function mostrarAlarmas()
{
    // Invocar el comando de Artisan para chequear las alarmas
    Artisan::call('app:check-alarms');

    // Obtener todas las alarmas junto con las órdenes de trabajo relacionadas
    $alarmas = Alarma::with('ordenTrabajo')->get();
    $usuario = Auth::user(); // Obtener el usuario autenticado// return $alarmas;
    // Redirigir a la vista con las alarmas y las órdenes de trabajo relacionadas
    return view('alarmas.show', compact('alarmas','usuario'));
}

}
