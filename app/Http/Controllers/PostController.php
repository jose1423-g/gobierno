<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concentrado;
use App\Models\Medidas;
use App\Models\Lamparas;
use App\Models\altura;
use App\Models\dependencia;
use App\Models\estatus;
use App\Models\potencia;
use App\Models\tipoposte;
use App\Models\transformador;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use Illuminate\Auth\Events\Validated;
use PhpParser\Node\Stmt\Return_;


class PostController extends Controller
{
    // all()->where()
    public function GetMedidasLamparas () {
        $medidas =  Medidas::all();        
        $lamparas =  Lamparas::all()->where('EsTecnologia', 1);    
        $tipo_luminaria =  Lamparas::all()->where('EsTecnologia', 2);    
        $altura =  altura::all();        
        $dependencia =  dependencia::all();    
        $estatus =  estatus::all();        
        $potencia =  potencia::all();    
        $tipoposte =  tipoposte::all();        
        $transformador =  transformador::all();        
        return view('welcome', [
            'medidas' => $medidas, 
            'lamparas' => $lamparas,
            'altura' => $altura, 
            'dependencia' => $dependencia,
            'estatus' => $estatus, 
            'potencia' => $potencia,
            'tipoposte' => $tipoposte,
            'transformador' => $transformador,
            'tipo_luminaria' => $tipo_luminaria
        ]);
    }

   
    public function CreateData (Request $request) {
        // $datos = $request->except('_token');
        // return $request;
        // return $request->all();
        $validated = $request->validate([
            'Sm_Av' => 'required',
            'Circuito' => 'required',
        ]);
            
        try {                        
            Concentrado::create($request->all());                                      
            return response()->json(['result' => '1', 'msg' => 'Datos guardados correctamente']);
        } catch (\Throwable $th) {            
            $holis =  Concentrado::create($request->all());                          
            return $holis;
            return response()->json(['result' => '0', 'msg' => 'Error al guardar los datos']);
        }        
    }


    public function getexcel () {    

        $a_data = Concentrado::all();   

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="prueba.xlsx"');
        header('Cache-Control: max-age=0');


        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No.');
        $activeWorksheet->setCellValue('B1', 'Sm/Av');
        $activeWorksheet->setCellValue('C1', 'Latitud');
        $activeWorksheet->setCellValue('D1', 'Longitud');
        $activeWorksheet->setCellValue('E1', 'Position');
        $activeWorksheet->setCellValue('F1', 'status');
        $activeWorksheet->setCellValue('G1', 'Circuito');
        $activeWorksheet->setCellValue('H1', 'Luminarias instaladas');
        $activeWorksheet->setCellValue('I1', 'Tipo de luminaria');
        $activeWorksheet->setCellValue('J1', 'Potencia watts');
        $activeWorksheet->setCellValue('K1', 'Tipo Poste');
        $activeWorksheet->setCellValue('L1', 'Dependencia');
        $activeWorksheet->setCellValue('M1', 'Altura metros');
        
        $val = 2;
        foreach ($a_data as $row){
            $activeWorksheet->setCellValue('A'. $val, $row->Sm_Av);
            $activeWorksheet->setCellValue('B'. $val, $row->Latitud);
            $activeWorksheet->setCellValue('C'. $val, $row->Longitud);
            $activeWorksheet->setCellValue('D'. $val, $row->Posicion);
            $activeWorksheet->setCellValue('E'. $val, $row->Id_medida);
            $activeWorksheet->setCellValue('F'. $val, $row->Circuito);
            $activeWorksheet->setCellValue('G'. $val, $row->Luminarias);
            $activeWorksheet->setCellValue('H'. $val, $row->Id_lampara);
            $activeWorksheet->setCellValue('I'. $val, $row->Potencia);
            $activeWorksheet->setCellValue('J'. $val, $row->Etiqueta);
            $activeWorksheet->setCellValue('K'. $val, $row->Tipo_poste);
            $activeWorksheet->setCellValue('L'. $val, $row->Dependencia);
            $activeWorksheet->setCellValue('M'. $val, $row->Altura);       
            $val ++;     
        }

        //agrega formulas
        // $activeWorksheet->setCellValue('D2', '=SUM(A2:C2)');

        // Establecer el color de fondo de una celda
        // $activeWorksheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');

        // Establecer el color de fuente de una celda
        // $activeWorksheet->getStyle('A1')->getFont()->getColor()->setARGB('FF0000');


        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');
 
    } 

    public function table () {
        // $a_data = Concentrado::all(); 
        $a_data = Concentrado::select('id', 'Sm_Av', 'Latitud', 'Longitud',
        'Circuito', 'Etiqueta', 'Luminarias', 'created_at', 'NumMedidor', 
        'Observaciones')->get();   
        foreach ($a_data as $data) {
            $fecha  = Carbon::parse($data->created_at)->format('d/m/Y');            
            $data->show_fecha = $fecha;            
            $data->boton = '<button type="button" id="btn_show" class="px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 me-2 focus:outline-none">Editar</button>';
        }        
        return response()->json(['data' => $a_data]);        
    }



    // select('shoppingcart.id', 'productos.Nombre', 'shoppingcart.Cantidad', 'shoppingcart.Precio', 'shoppingcart.Extra', 'categorias.Categoria')
    //     ->leftjoin('productos','productos.id','=','shoppingcart.IdProducto_fk')
    //     ->leftjoin('categorias','productos.idCategoria_fk','=','categorias.id')
    //     ->where('shoppingcart.idUsuario_fk', $id_user)
    //     ->get();
}
