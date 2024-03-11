<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Concentrado;
use App\Models\Medidas;
use App\Models\Lamparas;

class PostController extends Controller
{

    // all()->where()
    public function GetMedidas () {
        $medidas =  Medidas::all();        
        return $medidas;
    }

    public function GetLamparas () {
        $lamparas =  Lamparas::all();    
        return $lamparas;
    }


    public function CreateData (Request $request) {

        try {
            Concentrado::create($request->all());                  
            return response()->json(['result' => '1', 'msg' => 'Datos guardados correctamente']);
        } catch (\Throwable $th) {            
            return response()->json(['result' => '0', 'msg' => 'Error al guardar los datos']);
        }
        
    }

}
