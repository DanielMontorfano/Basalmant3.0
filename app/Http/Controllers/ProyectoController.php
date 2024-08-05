<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Importar Log para registrar mensajes
use App\Models\Ptarea;
use App\Models\Subtarea;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

   
        public function store(Request $request)
        {
            // Validar los datos del proyecto
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string|max:1000',
                'tareas' => 'required|array',
                'tareas.*.descripcion' => 'required|string|max:255',
                'tareas.*.subtareas' => 'required|array',
                'tareas.*.subtareas.*.descripcion' => 'required|string|max:255',
                'tareas.*.subtareas.*.fecha_inicio' => 'required|date',
                'tareas.*.subtareas.*.fecha_fin' => 'required|date|after_or_equal:tareas.*.subtareas.*.fecha_inicio',
            ]);
    
            // Variables para almacenar las fechas de inicio y fin del proyecto
            $proyectoFechaInicio = null;
            $proyectoFechaFin = null;
    
            // Crear un nuevo proyecto
            $proyecto = new Proyecto();
            $proyecto->nombre = $request->nombre;
            $proyecto->descripcion = $request->descripcion;
            $proyecto->creador = Auth::id();
            $proyecto->save();
    
            // Recorrer las tareas
            foreach ($request->tareas as $tareaData) {
                // Variables para almacenar las fechas de inicio y fin de la tarea
                $tareaFechaInicio = null;
                $tareaFechaFin = null;
    
                // Recorrer las subtareas para calcular las fechas de la tarea
                foreach ($tareaData['subtareas'] as $subtareaData) {
                    if ($tareaFechaInicio === null || $subtareaData['fecha_inicio'] < $tareaFechaInicio) {
                        $tareaFechaInicio = $subtareaData['fecha_inicio'];
                    }
                    if ($tareaFechaFin === null || $subtareaData['fecha_fin'] > $tareaFechaFin) {
                        $tareaFechaFin = $subtareaData['fecha_fin'];
                    }
                }
    
                // Actualizar las fechas de inicio y fin del proyecto
                if ($proyectoFechaInicio === null || $tareaFechaInicio < $proyectoFechaInicio) {
                    $proyectoFechaInicio = $tareaFechaInicio;
                }
                if ($proyectoFechaFin === null || $tareaFechaFin > $proyectoFechaFin) {
                    $proyectoFechaFin = $tareaFechaFin;
                }
    
                // Crear y guardar la tarea
                $tarea = new Ptarea();
                $tarea->proyecto_id = $proyecto->id;
                $tarea->descripcion = $tareaData['descripcion'];
                $tarea->fecha_inicio = $tareaFechaInicio;
                $tarea->fecha_fin = $tareaFechaFin;
                $tarea->save();
    
                // Recorrer las subtareas y guardarlas
                foreach ($tareaData['subtareas'] as $subtareaData) {
                    $subtarea = new Subtarea();
                    $subtarea->ptarea_id = $tarea->id;
                    $subtarea->descripcion = $subtareaData['descripcion'];
                    $subtarea->fecha_inicio = $subtareaData['fecha_inicio'];
                    $subtarea->fecha_fin = $subtareaData['fecha_fin'];
                    $subtarea->save();
                }
            }
    
            // Guardar las fechas de inicio y fin del proyecto
            $proyecto->fecha_inicio = $proyectoFechaInicio;
            $proyecto->fecha_fin = $proyectoFechaFin;
            $proyecto->save();
    
            // Redireccionar o devolver una respuesta
            return redirect()->route('proyectos.index')->with('success', 'Proyecto creado con éxito.');
        
    }


    // ProyectoController.php

    public function show($id)
    {
        $proyecto = Proyecto::with('ptareas.subtareas')->findOrFail($id);
    
        $tasksData = [];
        foreach ($proyecto->ptareas as $tarea) {
            // Agregamos la tarea principal
            $tasksData[] = [
                'name' => $tarea->descripcion,
                'id' => 'tarea' . $tarea->id,
                'start' => strtotime($tarea->fecha_inicio) * 1000, // Convertimos a timestamp en milisegundos
                'end' => strtotime($tarea->fecha_fin) * 1000 // Convertimos a timestamp en milisegundos
            ];
    
            // Agregamos las subtareas
            foreach ($tarea->subtareas as $subtarea) {
                $tasksData[] = [
                    'name' => $subtarea->descripcion,
                    'id' => 'subtarea' . $subtarea->id,
                    'parent' => 'tarea' . $tarea->id,
                    'start' => strtotime($subtarea->fecha_inicio) * 1000, // Convertimos a timestamp en milisegundos
                    'end' => strtotime($subtarea->fecha_fin) * 1000 // Convertimos a timestamp en milisegundos
                ];
            }
        }
    
        return view('proyectos.show', [
            'proyecto' => $proyecto,
            'tasksData' => $tasksData
        ]);
    }
    

    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado con éxito.');
    }
}
