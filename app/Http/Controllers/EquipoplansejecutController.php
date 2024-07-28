<?php

namespace App\Http\Controllers;

use App\Services\MantenimientoPlanService;
use App\Services\MantenimientoOrdenService; // Agrega el servicio MantenimientoOrdenService
use App\Models\Equipoplansejecut;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EquipoplansejecutController extends Controller
{
    protected $mantenimientoPlanService;
    protected $mantenimientoOrdenService; // Declara la propiedad para MantenimientoOrdenService

    public function __construct(
        MantenimientoPlanService $mantenimientoPlanService,
        MantenimientoOrdenService $mantenimientoOrdenService // Inyecta el servicio MantenimientoOrdenService
    ) {
        $this->mantenimientoPlanService = $mantenimientoPlanService;
        $this->mantenimientoOrdenService = $mantenimientoOrdenService; // Asigna el servicio MantenimientoOrdenService
    }
  
    public function index()
    {
        // Datos simulados para los gráficos
        $data1 = [
            ['name' => 'Categoría A', 'y' => 61.41],
           
            ['name' => 'Categoría E', 'y' => 11.23]
        ];
        
        $data2 = [
            ['name' => 'Categoría F', 'y' => 12.8],
            ['name' => 'Categoría G', 'y' => 10.85],
            ['name' => 'Categoría H', 'y' => 4.67],
            ['name' => 'Categoría I', 'y' => 3.96],
            ['name' => 'Categoría J', 'y' => 67.72]
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
     
        return view('seguimientos.menuSeguimientos', compact('data1', 'data2', 'data3', 'data4', 'data5', 'data6'));
     
       // return view('seguimientos.menuSeguimientos');
      
    }
     
    public function pendientes()
    {
      // Usar el servicio MantenimientoPlanService
      $planesPendientes = $this->mantenimientoPlanService->getPlanesPendientes();

      // Usar el servicio MantenimientoOrdenService
      $ordenesAbiertas = $this->mantenimientoOrdenService->getPlanesPendientes();
      $equiposSinPlan  = $this->mantenimientoPlanService->getEquiposSinPlan();
      // Aquí puedes hacer cualquier otra lógica con los datos obtenidos de los servicios

    /*  return [
          'planes_pendientes' => $planesPendientes,
          'ordenes_abiertas' => $ordenesAbiertas,
      ];
    */
    //return $planesPendientes;
   // return $equiposSinPlan;
      return view('seguimientos.index',compact('planesPendientes'));
      
    }
    
    public function sinPlan()
    {
     
      $equiposSinPlanes  = $this->mantenimientoPlanService->getEquiposSinPlan();
     
    //return $planesPendientes;
   // return $equiposSinPlan;
      return view('seguimientos.equiposSinPlan',compact('equiposSinPlanes'));
      
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function show(Equipoplansejecut $equipoplansejecut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipoplansejecut $equipoplansejecut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipoplansejecut $equipoplansejecut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipoplansejecut  $equipoplansejecut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipoplansejecut $equipoplansejecut)
    {
        //
    }
}
