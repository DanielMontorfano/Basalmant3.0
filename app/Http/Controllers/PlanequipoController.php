<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planequipo;

class PlanequipoController extends Controller
{
    public function index(){

      $Regcompletos= Planequipo::all();
      //return  $Regcompletos;
      $Puntos=[];
      foreach($Regcompletos as $Regcompleto){
        $Puntos[] = ['name'=> $Regcompleto['equipo'], 'y'=>floatval($Regcompleto['porcentaje'])];
        
      }

      return json_encode($Puntos);
        return view("graficos" , ["data" => json_encode($Puntos)]);



    }
}
