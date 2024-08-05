<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEquipo;
use Illuminate\Support\Facades\DB;
use App\Models\EquipoRepuesto; 
use App\Models\Equipoplan; 
use App\Models\equipoEquipo;
use App\Models\Repuesto;
use App\Models\Foto;
use App\Models\Documento;
use App\Models\Plan;
use App\Models\Protocolo;
use App\Models\Aviso;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

//use Illuminate\Support\Collection;



class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Obtener el usuario autenticado
    $usuario = Auth::user();
   
    // Obtener todos los equipos
    $equipos = Equipo::all();
    // Obtener los avisos del usuario autenticado
    $avisos = Aviso::where('usuario_id', $usuario->id)->get();

    $role=Auth::user()->role;

    // Retornar la vista con las variables necesarias
    return view('equipos.index', compact('equipos', 'usuario', 'avisos', 'role'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repuestos= Repuesto::all();
        //return $repuestos;
        
        return view('equipos.create',compact('repuestos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(StoreEquipo $request)
{
    // Validar los campos del formulario
    $request->validate([
        'codEquipo' => ['required', 'regex:/^\d{2}-[A-Z]{3}-\d{2}[\w-]\d{2}$/'], // Modificado para permitir alfanumérico solo en el décimo carácter
        'marca' => 'required|min:3',
        'modelo' => 'required',
    ], [
        'codEquipo.regex' => 'El código debe tener el formato adecuado Ej.:"01-ABC-12345".',
    ]);

    // Crear un nuevo equipo y asignar los valores del formulario
    $equipo = new Equipo();
    $equipo->codEquipo = $request->codEquipo;
    $equipo->marca = $request->marca;
    $equipo->modelo = $request->modelo;
    $equipo->idSecc = $request->idSecc;
    $equipo->idSubSecc = $request->idSubSecc;
    $equipo->det1 = $request->det1;
    $equipo->det2 = $request->det2;
    $equipo->det3 = $request->det3;
    $equipo->det4 = $request->det4;
    $equipo->det5 = $request->det5;
    $equipo->creador = auth()->user()->name; // Asignar el ID del usuario autenticado

    // Guardar el equipo en la base de datos
    $equipo->save();

    // Redirigir a la vista del equipo creado
    return redirect()->route('equipos.show', $equipo->id);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // Encuentra el equipo por su ID o lanza una excepción si no se encuentra
            // Reemplazamos find() con findOrFail() para manejar la ausencia del registro
            $equipo = Equipo::findOrFail($id); // Antes: $equipo = Equipo::find($id);
    
            // Recupera los repuestos asociados al equipo
            // Utiliza el objeto $equipo para acceder a las relaciones, evitando múltiples consultas
            $repuestos = $equipo->equiposRepuestos; // Antes: $repuestos = Equipo::find($id)->equiposRepuestos;
    
            // Recupera los planes asociados al equipo
            $plans = $equipo->equiposPlans; // Antes: $plans = Equipo::find($id)->equiposPlans;
    
            // Recupera los equipos B asociados al equipo
            $equiposB = $equipo->equiposAEquiposB; // Antes: $equiposB = Equipo::find($id)->equiposAEquiposB;
    
            // Recupera la primera ruta de foto para el equipo
            // Utiliza el ID del equipo para encontrar la ruta de la primera foto
            $primerRutaFoto = Foto::where('equipo_id', $equipo->id)->value('rutaFoto');
    
            // Devuelve la vista con las variables necesarias
            // Usamos compact() para pasar múltiples variables a la vista de manera más limpia
            return view('equipos.show', compact('equipo', 'repuestos', 'plans', 'equiposB', 'primerRutaFoto'));
            // Antes: return view('equipos.show', compact('id', 'equipo', 'repuestos', 'plans', 'equiposB', 'primerRutaFoto'));
        } catch (\Exception $e) {
            // Maneja el error si el equipo no se encuentra o hay otro problema
            // Redirige a la página de índice con un mensaje de error
            return redirect()->route('equipos.index')
                             ->with('error', 'No se pudo encontrar el equipo. Error: ' . $e->getMessage());
        }
    }
    public function showphoto($id)  //Segunda Manera de Recuperar el registro pasando el id
        {
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa
        $repuestos=$equipo->equiposRepuestos; // otra alternativa: $repuestos= Equipo::find($id)->equiposRepuestos; en una sola linea. 
        
        //return $equipo;
        //return 'hhhhhhhhhhhhhhhh' . $repuestos;
        //return view('Equipos.show', ['variable'=>$equipo]); video anterior

       return view('equipos.showphoto', compact('equipo','repuestos')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
    }
    




   // public function show(Equipo $equipo) //de esta manera es mas elegante pero cuesta entender laravel sabe que se trata del id de un registro
   // {    
      // echo 'hola mundo';
       // $repuestos=['codEquipo'=>'wreq', 'marca'=>'fgfhfh', 'modelo'=>'mbnvmbnmnv'];
       // return view('equipos.show', compact('equipo', 'repuestos')); //Envío todo el registro en cuestión
        //return view('equipos.show', compact('equipo')); //Envío todo el registro en cuestión
        //return view('Equipos.show');
   // }
    








    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    //****************************************
    /*
    public function edit(Equipo $equipo)  //Primera marnera: Existen dos Maneras de recuperar el registro
    {
       // $equipo= Equipo::find($id);
        //return $equipo; //
        return view('equipos.edit', compact('equipo')); //para enviar a la vista el registro recuprado
    }
     */
    //*********************************** 
    public function edit($id)  //Segunda Manera de Recuperar el registro
    { 
        $repuestosTodos=Repuesto::all();
        
        $equipo=Equipo::find($id);
        $repuestos= Equipo::find($id)->equiposRepuestos; //"equiposRepuestos" Metodo perteneciente al modelo Equipo
        $fotosTodos=Equipo::find($id)->fotos; //Aqui hago referencia al Metodo fotos perteneciente al modelo Equipo que trae los registro del modelo fotos vinculados a este equipo
        $documentos=Equipo::find($id)->documentos;
        $planes=Equipo::find($id)->equiposPlans; 
       // $lubricaciones=Equipo::find($id)->lubricaciones;
       $lubricaciones = $equipo->lubricaciones->unique(); //Para que aparezaca solo una vez
        $equiposB=Equipo::find($id)->equiposAEquiposB; 
       // return $lubricaciones;
        //$repuesto=$equipo->equiposRepuestos;
        //foreach($repuestos as $repuesto){
            //<p>factura: {{ $entrada->factura }}</p>
            //<p>fecha entrada: {{ $entrada->fecha }}</p>
            //if($repuesto->pivot->cant )
           // if(!is_null($repuesto->pivot->cant)){
            //echo  $repuesto->pivot->cant . '***' .$repuesto->codigo . '<br>';
            //}
      //  }
       // return ;
        return view('equipos.edit', compact('equipo','repuestos', 'repuestosTodos','fotosTodos','documentos','planes','lubricaciones','equiposB'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Equipo $equipo) //En realidad se abre una instancia Equipo, de la cual se recupera el registro enviado en $equipo
    public function update(Request $request, $id)
    {
        // Validar los campos del formulario
        $request->validate([
            'codEquipo' => ['required', 'regex:/^\d{2}-[A-Z]{3}-\d{2}[\w-]\d{2}$/'], // Modificado para permitir alfanumérico solo en el décimo carácter
            'marca' => 'required|min:3',
            'modelo' => 'required',
        ], [
            'codEquipo.regex' => 'El código debe tener el formato adecuado Ej.:"01-ABC-12345".',
        ]);
    
        // Buscar el equipo por su ID
        $equipo = Equipo::findOrFail($id);

        //Forma tradicional!!!!!!!!!!!

          // Crear un nuevo equipo y asignar los valores del formulario
          //$equipo = new Equipo();
          $equipo->codEquipo = $request->codEquipo;
          $equipo->marca = $request->marca;
          $equipo->modelo = $request->modelo;
          $equipo->idSecc = $request->idSecc;
          $equipo->idSubSecc = $request->idSubSecc;
          $equipo->det1 = $request->det1;
          $equipo->det2 = $request->det2;
          $equipo->det3 = $request->det3;
          $equipo->det4 = $request->det4;
          $equipo->det5 = $request->det5;
          $equipo->creador = auth()->user()->name; // Asignar el ID del usuario autenticado
      
          // Guardar el equipo en la base de datos
          $equipo->save();

        
        // Forma elegante, NO FUNCIONA!!!  Actualizar los valores del equipo con los del formulario
        /*$equipo->update([
            'codEquipo' => $request->codEquipo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'idSecc' => $request->idSecc,
            'idSubSecc' => $request->idSubSecc,
            'det1' => $request->det1,
            'det2' => $request->det2,
            'det3' => $request->det3,
            'det4' => $request->det4,
            'det5' => $request->det5,
        ]);*/
    
        // Redirigir a la vista del equipo actualizado
        return redirect()->route('equipos.show', $equipo->id);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    try {
        $equipo = Equipo::findOrFail($id);

        // Elimina las relaciones en tablas pivote si existen
        $equipo->equiposRepuestos()->detach();
        $equipo->equiposPlans()->detach();
        $equipo->equiposPlansejecut()->detach();  //OJO tengo un error en las s de la tabla y modelo
        $equipo->equiposAEquiposB()->detach();
        $equipo->equiposBEquiposA()->detach();
        $equipo->equiposTareash()->detach();
        $equipo->lubricaciones()->detach();

        // Elimina los registros dependientes
        $equipo->ordentrabajo()->delete(); // Elimina todas las órdenes de trabajo relacionadas
        $equipo->fotos()->delete();        // Elimina todas las fotos relacionadas
        $equipo->documentos()->delete();  // Elimina todos los documentos relacionados

        // Elimina el equipo
        $equipo->delete();
        //dd('Borrado: ' . $id);
       //Equipo::destroy($id);
       //Equipo::where('id', $id)->delete();

        return redirect()->route('equipos.index')
                         ->with('success', 'Equipo eliminado con éxito.');
    } catch (\Exception $e) {

       //dd('No pude borrar: ' . $id . $e->getMessage());
        return redirect()->route('equipos.index')
                         ->with('error', 'No se pudo eliminar el equipo. Error: ' . $e->getMessage());
    }
}





     
    public function equipoTareasShow($id)  //Segunda Manera de Recuperar el registro pasando el id
        {
        $equipo= Equipo::find($id); // Ver la linea de abajo alternativa
        $plans=Equipo::find($id)->equiposPlans; 
        $PlanP= [];
        $ProtocoloP = [];
        $Tareas=[];


        foreach($plans as $plan){
        $plan_id=$plan->pivot->plan_id;
        $planParciales= Plan::find( $plan_id); 
        $PlanP[]=array('id'=>$planParciales->id, 'codigo'=>$planParciales->codigo, 'nombre'=> $planParciales->nombre, 'descripcion'=> $planParciales->descripcion, 'frecuencia'=> $planParciales->frecuencia, 'unidad'=> $planParciales->unidad);
        $protocolos=$planParciales->plansProtocolos;

        foreach($protocolos as $protocolo){
            $proto_id= $protocolo->pivot->proto_id; //busco el id del protocolo relacionado
            $protocolosParciales= Protocolo::find( $proto_id); // traigo la coleccion de ese protocolo
            $ProtocoloP[]=array('id'=>$protocolosParciales->id,'codProto'=> $protocolosParciales->codigo, 'descripcion'=> $protocolosParciales->descripcion);
            $tareas=$protocolosParciales->protocolosTareas; // traigo todas las tareas de ese protocolo
        foreach($tareas as $tarea){
            // echo $plan->id . "*" . $protocolo->codigo . "*" . $tarea->codigo .  "*" .  $tarea->descripcion . "<br>";
                
              $Tareas[] =array('tarea_id'=>$tarea->id, 'cod'=>$protocolosParciales->codigo, 'codigoTar' => $tarea->codigo, 'descripcion' => $tarea->descripcion, 'duracion'=>$tarea->duracion);
           
        }
      }  
    }

      return view('equipos.equipoTareasShow', compact('equipo','PlanP', 'ProtocoloP','Tareas')); //Envío todo el registro en cuestión

       // return view('Equipos.show');
    }

     //****************************CLONAR******************************************* */
     public function clonar($id)
    { //$request trae lo del formulario, $id el id de equipo, trae lo que tengo en el registro sin modificar                                  
        //$request->validate(['codEquipo'=>'required', 'marca'=>'required', 'modelo'=>'required']);
        $equipo= Equipo::find($id);
        $repuestos=$equipo->equiposRepuestos;
        $plans=$equipo->equiposPlans;
        $equiposB=$equipo->equiposAEquiposB;
        //return $equiposB;
              
        $codEquipo="XX-CLON-XX-XX";
        $clon= new Equipo();
        $clon->codEquipo=$codEquipo;
        $clon->marca=$equipo->marca;  //OJO estaba anulada;01/04/2023
        $clon->modelo=$equipo->modelo;
        $clon->idSecc=$equipo->idSecc;
        $clon->idSubSecc=$equipo->idSubSecc;
        $clon->det1=$equipo->det1;
        $clon->det2=$equipo->det2;
        $clon->det3=$equipo->det3;
        $clon->det4=$equipo->det4;
        $clon->det5=$equipo->det5;
        $clon=$clon->save();
        
        $equipo = Equipo::latest('id')->first(); //toma el id del clon
        
        foreach($repuestos as $repuesto){
        $E_R= new EquipoRepuesto();
        $E_R->equipo_id=$equipo->id;
        $E_R->repuesto_id=$repuesto->id;
        $E_R->unidad=$repuesto->pivot->unidad;
        $E_R->cant=$repuesto->pivot->cant;
        $E_R->check1=$repuesto->pivot->check1;
        //dd(request()->all());

        $E_R->save();
         }
        
       // $equipo = Equipo::latest('id')->first(); //toma el id del clon
       // return   $equipo->id;
        // $mensaje='ENTRE A GRABAR PLANES vinculados';
        foreach($plans as $plan){
        $equipo_id=$equipo->id;
        $plan_id=$plan->id;    
        $E_P= new Equipoplan();
        $E_P->equipo_id=$equipo_id;
        $E_P->plan_id=$plan_id;
        $E_P->save();
        }

        // $mensaje='ENTRE A GRABAR Equipos vinculados';
        // goto salir;
        foreach($equiposB as $equipoB){
        $equipo_id=$equipo->id;  
        $EquipoB_id=$equipoB->id;
        $E_E= new equipoEquipo();
        $E_E->equipo_id=$equipo_id;
        $E_E->vinc_id=$EquipoB_id;
        $E_E->save();
        }
        
       return redirect()->route('equipos.show', $equipo->id); //se puede omitir ->id, igual funciona
       //**********return view('equipos.show', compact('equipo','repuestos', 'plans','equiposB')); //Envío show todo el registro en cuestión, sin $
       //return $repuestos;
    }







}
