<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concentrado;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    public function CreateData (Request $request) {                
                    
        try {                        
            Concentrado::create($request->all());
            return response()->json(['result' => '1', 'msg' => 'Datos guardados correctamente']);
        } catch (\Throwable $th) {                     
            return response()->json(['result' => '0', 'msg' => 'Error al guardar los datos']);
        }
    }


    public function AddData (Request $request) {
        $items = $request->data;
        if (count($items) == 0) {
            return response()->json(['result' => '0', 'msg' => 'Esta vacio']);
        } else {
            try {               
                foreach ($items as $row) {
                    Concentrado::create($row);                
                }
                return response()->json(['result' => '1', 'msg' => 'Datos guardados correctamente']);
            } catch (\Throwable $th) {                        
                return response()->json(['result' => '0', 'msg' => 'Error al guardar los datos']);
            }    
        }
                        
        
    }
    
    public function UpdateData (Request $request) {
        $data = $request->except('Latitud', 'Longitud', '_token');        
        try {
            Concentrado::where('id', $request->id)->update($data);    
            return response()->json(['result' => '1', 'msg' => 'Datos actulizados correctamente']);
        } catch (\Throwable $th) {            
            return response()->json(['result' => '0', 'msg' => 'Error al actualizar los datos']);
        }
        
    }

    public function table () {        
        $a_data = Concentrado::select('id', 'Sm_Av', 'Latitud', 'Longitud',
        'Circuito', 'Etiqueta', 'Luminarias', 'created_at', 'NumMedidor', 
        'Observaciones')->get();   
        foreach ($a_data as $data) {
            $fecha  = Carbon::parse($data->created_at)->format('d/m/Y');            
            $data->show_fecha = $fecha;            
            $data->boton = '<button id="btn_show" class="block px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300" type="button">Editar</button>';
        }        
        return response()->json(['data' => $a_data]);        
    }

    public function ShowData(Request $request) {      
        /* cambiar los procesos el seelct para que pueda traer datos que se ingresaron a mano */  
        $a_data =  Concentrado::select(
        'Sm_Av',
        'Latitud',
        'Longitud',        
        DB::raw('COALESCE(medidas.Descripcion, concentrado.Id_medida_fk) AS Id_medida_fk'),        
        DB::raw('COALESCE(transformador.Voltaje, concentrado.Id_transformador_fk) AS Id_transformador_fk'),
        'Circuito',
        'NumMedidor',
        'Luminarias',        
        DB::raw('COALESCE(estatus.descripcion, concentrado.Id_estatus_fk) AS Id_estatus_fk'),        
        DB::raw('COALESCE(lamparas.descripcion, concentrado.Id_lampara_fk) AS Id_lampara_fk'),        
        DB::raw('COALESCE(lamparas.descripcion, concentrado.Id_tipoLuminaria_fk) AS Id_tipoLuminaria_fk'),
        DB::raw('COALESCE(potencia.descripcion, concentrado.Id_potencia_fk) AS Id_potencia_fk'),
        'Etiqueta',        
        DB::raw('COALESCE(tipoposte.descripcion, concentrado.Id_poste_fk) AS Id_poste_fk'),
        DB::raw('COALESCE(dependencia.descripcion, concentrado.Id_dependencia_fk) AS Id_dependencia_fk'),
        DB::raw('COALESCE(altura.descripcion, concentrado.Id_altura_fk) AS Id_altura_fk'),
        'Observaciones'
        )
        ->leftjoin('medidas','concentrado.id_medida_fk','=','medidas.id_medida')
        ->leftjoin('lamparas','concentrado.id_lampara_fk','=','lamparas.Id_lampara')
        ->leftjoin('lamparas as tipo_lampara','concentrado.Id_tipoLuminaria_fk','=','tipo_lampara.id_lampara')
        ->leftjoin('potencia','concentrado.id_potencia_fk','=','potencia.id_potencia')
        ->leftjoin('tipoposte','concentrado.id_poste_fk','=','tipoposte.id_poste')
        ->leftjoin('dependencia','concentrado.id_dependencia_fk','=','dependencia.id_dependencia')
        ->leftjoin('altura','concentrado.id_altura_fk','=','altura.id_altura')
        ->leftjoin('estatus','concentrado.id_estatus_fk','=','estatus.id_estatus')
        ->leftjoin('transformador','concentrado.id_transformador_fk','=','transformador.id_transformador')        
        ->where('id', $request->id)->get();
        return $a_data;
    }

    public function ExcelConcentrado (Request $request) {
        // return $request;
        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;
        $fecha_desde." 00:00:00";
        $fecha_hasta." 00:00:00";
        
        $a_data = Concentrado::select(
        'concentrado.Sm_Av',
        'concentrado.Latitud', 
        'concentrado.Longitud', 
        'concentrado.Circuito', 
        'concentrado.Etiqueta', 
        'concentrado.Luminarias',        
        DB::raw('COALESCE(medidas.Descripcion, concentrado.Id_medida_fk) AS Medida'), 
        DB::raw('COALESCE(lamparas.descripcion, concentrado.Id_lampara_fk) AS lamparatecnologia'),
        DB::raw('COALESCE(potencia.descripcion, concentrado.Id_potencia_fk) AS potencia'),        
        DB::raw('COALESCE(tipoposte.descripcion, concentrado.Id_poste_fk) AS poste'),
        DB::raw('COALESCE(dependencia.descripcion, concentrado.Id_dependencia_fk) AS dependencia'), 
        DB::raw('COALESCE(altura.descripcion, concentrado.Id_altura_fk) AS altura'),
        DB::raw('COALESCE(estatus.descripcion, concentrado.Id_estatus_fk) AS estatus'), 
        DB::raw('COALESCE(transformador.Voltaje, concentrado.Id_transformador_fk) AS voltaje'),
        DB::raw('COALESCE(lamparas.descripcion, concentrado.Id_tipoLuminaria_fk) AS Id_tipoLuminaria_fk'),
        'concentrado.NumMedidor',
        'concentrado.Observaciones')
        ->leftjoin('medidas','concentrado.id_medida_fk','=','medidas.id_medida')
        ->leftjoin('lamparas','concentrado.id_lampara_fk','=','lamparas.id_lampara')
        ->leftjoin('lamparas as tipo_lampara','concentrado.Id_tipoLuminaria_fk','=','tipo_lampara.id_lampara')
        ->leftjoin('potencia','concentrado.id_potencia_fk','=','potencia.id_potencia')
        ->leftjoin('tipoposte','concentrado.id_poste_fk','=','tipoposte.id_poste')
        ->leftjoin('dependencia','concentrado.id_dependencia_fk','=','dependencia.id_dependencia')
        ->leftjoin('altura','concentrado.id_altura_fk','=','altura.id_altura')
        ->leftjoin('estatus','concentrado.id_estatus_fk','=','estatus.id_estatus')
        ->leftjoin('transformador','concentrado.id_transformador_fk','=','transformador.id_transformador')
        ->whereBetween('created_at', [$fecha_desde, $fecha_hasta])
        ->orWhere('concentrado.Sm_Av', $request->Sm_Av)
        ->orWhere('concentrado.Circuito', $request->Circuito)
        // ->orWhere('concentrado.Etiqueta', $request->Etiqueta)
        // ->orWhere('concentrado.Luminarias', $request->Luminarias)/* esta es la que trae todos los datos */
        ->orWhere('concentrado.Id_medida_fk', $request->Id_medida_fk)
        ->orWhere('concentrado.Id_lampara_fk', $request->Id_lampara_fk)
        // ->orWhere('concentrado.Id_potencia_fk', $request->Id_potencia_fk)
        // ->orWhere('concentrado.Id_poste_fk', $request->Id_poste_fk)
        // ->orWhere('concentrado.Id_dependencia_fk', $request->Id_dependencia_fk)
        // ->orWhere('concentrado.Id_altura_fk', $request->Id_altura_fk)
        ->orWhere('concentrado.Id_estatus_fk', $request->Id_estatus_fk)
        // ->orWhere('concentrado.Id_transformador_fk', $request->Id_transformador_fk)
        ->orWhere('concentrado.Id_tipoLuminaria_fk', $request->id_tipoLuminaria_fk)
        // ->orWhere('concentrado.NumMedidor', $request->NumMedidor)
        // ->orWhere('concentrado.Observaciones', $request->Observaciones)        
        ->get();
        
        if (!count($a_data) == 0) {            
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="concentrado.xlsx"');
            header('Cache-Control: max-age=0');
            $val = 2;
            $index = 1;

            $spreadsheet = new Spreadsheet();
            $activeWorksheet = $spreadsheet->getActiveSheet();
            /* head del documento */
            $activeWorksheet->setCellValue('A1', 'No.');
            $activeWorksheet->setCellValue('B1', 'Sm/Av');
            $activeWorksheet->setCellValue('C1', 'Latitud');
            $activeWorksheet->setCellValue('D1', 'Longitud');
            $activeWorksheet->setCellValue('E1', 'Circuito');
            $activeWorksheet->setCellValue('F1', 'Etiqueta');
            $activeWorksheet->setCellValue('G1', 'No Luminarias');
            $activeWorksheet->setCellValue('H1', 'Medida');
            $activeWorksheet->setCellValue('I1', 'Tecnologia');
            $activeWorksheet->setCellValue('J1', 'Potencia');
            $activeWorksheet->setCellValue('K1', 'Poste');        
            $activeWorksheet->setCellValue('L1', 'dependencia');
            $activeWorksheet->setCellValue('M1', 'Añtura');
            $activeWorksheet->setCellValue('N1', 'Estatus');        
            $activeWorksheet->setCellValue('O1', 'Voltaje');
            $activeWorksheet->setCellValue('P1', 'Tipo de luminaria');
            $activeWorksheet->setCellValue('Q1', 'No Medidor');        
            $activeWorksheet->setCellValue('R1', 'Observaciones');        
            /* define el tamaño de las columnas */
            $activeWorksheet->getColumnDimension('A')->setWidth(25);
            $activeWorksheet->getColumnDimension('B')->setWidth(25);
            $activeWorksheet->getColumnDimension('C')->setWidth(25);
            $activeWorksheet->getColumnDimension('D')->setWidth(25);
            $activeWorksheet->getColumnDimension('E')->setWidth(25);
            $activeWorksheet->getColumnDimension('F')->setWidth(25);
            $activeWorksheet->getColumnDimension('G')->setWidth(25);
            $activeWorksheet->getColumnDimension('H')->setWidth(25);
            $activeWorksheet->getColumnDimension('I')->setWidth(25);
            $activeWorksheet->getColumnDimension('J')->setWidth(25);
            $activeWorksheet->getColumnDimension('K')->setWidth(25);
            $activeWorksheet->getColumnDimension('L')->setWidth(25);
            $activeWorksheet->getColumnDimension('M')->setWidth(25);
            $activeWorksheet->getColumnDimension('N')->setWidth(25);
            $activeWorksheet->getColumnDimension('O')->setWidth(25);
            $activeWorksheet->getColumnDimension('P')->setWidth(25);
            $activeWorksheet->getColumnDimension('Q')->setWidth(25);
            $activeWorksheet->getColumnDimension('Q')->setWidth(25);
            /* imprime los datos */
            foreach ($a_data as $row){
                $activeWorksheet->setCellValue('A'. $val, $index);
                $activeWorksheet->setCellValue('B'. $val, $row->Sm_Av);
                $activeWorksheet->setCellValue('C'. $val, $row->Latitud);
                $activeWorksheet->setCellValue('D'. $val, $row->Longitud);
                $activeWorksheet->setCellValue('E'. $val, $row->Circuito);
                $activeWorksheet->setCellValue('F'. $val, $row->Etiqueta);
                $activeWorksheet->setCellValue('G'. $val, $row->Luminarias);
                $activeWorksheet->setCellValue('H'. $val, $row->Medida);
                $activeWorksheet->setCellValue('I'. $val, $row->lamparatecnologia);
                $activeWorksheet->setCellValue('J'. $val, $row->potencia);
                $activeWorksheet->setCellValue('K'. $val, $row->poste);
                $activeWorksheet->setCellValue('L'. $val, $row->dependencia);
                $activeWorksheet->setCellValue('M'. $val, $row->altura);
                $activeWorksheet->setCellValue('N'. $val, $row->estatus);
                $activeWorksheet->setCellValue('O'. $val, $row->voltaje);     
                $activeWorksheet->setCellValue('P'. $val, $row->Id_tipoLuminaria_fk);     
                $activeWorksheet->setCellValue('Q'. $val, $row->NumMedidor);   
                $activeWorksheet->setCellValue('R'. $val, $row->Observaciones);       
                $val ++;     
                $index++;
            }
            // Obtener el rango de celdas que cubren todas las columnas
            $lastColumn = $activeWorksheet->getHighestColumn();
            $range = 'A1:' . $lastColumn . $activeWorksheet->getHighestRow();
            // Alinear el texto a la izquierda en todas las columnas
            $alignment = $activeWorksheet->getStyle($range)->getAlignment();
            $alignment->setHorizontal(Alignment::HORIZONTAL_LEFT);
            
            /* descarga el excel */
            $writer = new Xlsx($spreadsheet);        
            $writer->save('php://output');
            
        } else {            
            return view('getexcel', ['msg' => 'No se encontraron resultados :(']);
        }        
    } 
}
