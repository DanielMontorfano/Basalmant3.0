<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class SearchUsersController extends Controller
{
    public function users(Request $request){
        // Agrega un mensaje de registro para verificar si el método se está ejecutando
        Log::info('Entrando al método users del controlador SearchUsersController');

        // También puedes usar dd() para detener la ejecución y mostrar información
        // dd('Entrando al método users del controlador SearchUsersController');

        // Continúa con el resto del código del método
        $term = $request->get('term');
        $length = strlen($term);  // Para que empiece a buscar a partir de determinada longitud
        if($length > 2){
            $querys = User::where('name', 'LIKE', '%' . $term . '%')
                            ->orWhere('username', 'LIKE', '%' . $term . '%')->get();
            $data = [];
            foreach($querys as $query){
                $data[] = [
                    //'label' =>$query->codigo ." ". $query->descripcion . " " . $query->id    // Agrego query->id para depurar
                    'label' => $query->user . " " . $query->username     // Ojo el símbolo => es para arrays 
                ];
            }
        } else {
            $data = [];
        }
        $data=User::all();
        return $data;
    }
}
