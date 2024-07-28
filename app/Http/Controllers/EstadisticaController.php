<?php

namespace App\Http\Controllers;

use App\Models\Estadistica;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Repuesto;



class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalEquipos = Equipo::count();

        // Obtener equipos sin repuestos
        $equiposSinRepuestos = Equipo::whereDoesntHave('equiposRepuestos')->get(['id', 'creador']);

        // Calcular la cantidad de equipos sin repuestos
        $cantEqSRep = $equiposSinRepuestos->count();

        // Calcular el porcentaje de equipos sin repuestos
        $porcentaje = ($totalEquipos > 0) ? ($cantEqSRep / $totalEquipos) * 100 : 0;
        $cantCRepuesto=100- $porcentaje;
        
       //***************************EQUIPOS SIN PLAN**********************************/

        // Obtener equipos sin planes de mantenimiento
        $equiposSinPlan = Equipo::whereDoesntHave('equiposPlans')->get(['id', 'codEquipo','creador']);
        // Calcular la cantidad de equipos sin repuestos
        $cantEqSPlan =  $equiposSinPlan->count();
        // Calcular el porcentaje de equipos sin repuestos
        $porcentaje1 = ($totalEquipos > 0) ? ($cantEqSPlan / $totalEquipos) * 100 : 0;
        $cantCPlan=100- $porcentaje;
    // Crear avisos para cada equipo sin repuestos





         // Datos simulados para los gráficos
         $data1 = [
            ['name' => 'Sin repuesto', 'y' =>  $porcentaje],
           
            ['name' => 'Correctos', 'y' =>$cantCRepuesto]
        ];
        
        $data2 = [
            ['name' => 'Sin plan', 'y' => $porcentaje1],
            ['name' => 'Correctos', 'y' => $cantCPlan]
            
        ];

        $data3 = [
            ['name' => 'Categoría K', 'y' => 29.41],
            ['name' => 'Categoría L', 'y' => 11.84],
            ['name' => 'Categoría M', 'y' => 33.85],
            ['name' => 'Categoría N', 'y' => 24.67],
            ['name' => 'Categoría O', 'y' => 0.23]
        ];

        $data4 = [
            ['name' => 'Categoría P', 'y' => 10.41],
            ['name' => 'Categoría Q', 'y' => 41.84],
            ['name' => 'Categoría R', 'y' => 22.85],
            ['name' => 'Categoría S', 'y' => 14.67],
            ['name' => 'Categoría T', 'y' => 10.23]
        ];

        $data5 = [
            ['name' => 'Categoría U', 'y' => 51.41],
            ['name' => 'Categoría V', 'y' => 31.84],
            ['name' => 'Categoría W', 'y' => 10.85],
            ['name' => 'Categoría X', 'y' => 4.67],
            ['name' => 'Categoría Y', 'y' => 1.23]
        ];

        $data6 = [
            ['name' => 'Categoría Z', 'y' => 21.41],
            ['name' => 'Categoría AA', 'y' => 41.84],
            ['name' => 'Categoría BB', 'y' => 10.85],
            ['name' => 'Categoría CC', 'y' => 4.67],
            ['name' => 'Categoría DD', 'y' => 21.23]
        ];

        // Pasar los datos a la vista
     
      //  return view('seguimientos.menuSeguimientos', compact('data1', 'data2', 'data3', 'data4', 'data5', 'data6'));


        return view('Estadistica.proyecto1', compact('data1', 'data2', 'data3', 'data4', 'data5', 'data6'));
        return view('Estadistica.index', compact('data1', 'data2', 'data3', 'data4', 'data5', 'data6'));


    }

    /**
     * Show the form for creating a new resource.
     */
  // app/Http/Controllers/EstadisticaController.php

// app/Http/Controllers/EstadisticaController.php

public function gantt()
{
    $tasksData = [
        [
            'name' => 'Tarea 1',
            'start' => \Carbon\Carbon::create(2023, 4, 1)->timestamp * 1000,
            'end' => \Carbon\Carbon::create(2023, 4, 14)->timestamp * 1000,
            'completed' => [
                'amount' => 0.5
            ]
        ],
        [
            'name' => 'Tarea 2',
            'start' => \Carbon\Carbon::create(2023, 4, 15)->timestamp * 1000,
            'end' => \Carbon\Carbon::create(2023, 4, 28)->timestamp * 1000,
            'completed' => [
                'amount' => 0.8
            ]
        ]
    ];

    return view('Estadistica.gantt', [
        'tasksData' => $tasksData,
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estadistica $estadistica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estadistica $estadistica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estadistica $estadistica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estadistica $estadistica)
    {
        //
    }
}
