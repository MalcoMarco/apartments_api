<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Availability;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index (){
        $diponibilidades = Availability::all();
        //$levels = Apartment::select('level')->distinct()->get();
        $levels = Apartment::distinct()->pluck('level');
        $dataHeader = [['value'=>"LEVEL #"]];
        
        foreach ($diponibilidades as $diponibilidad) {
            array_push($dataHeader,[
                'value' => $diponibilidad->name,
            ]);
        }
        array_push($dataHeader,[
            'value' => "Total Resultado",
        ]);
        $dataBody =[];
        foreach ($levels as $level) {
            $dataRow = [];
            array_push($dataRow,[
                'value' => $level,
            ]);
            $sumTotal = 0;
            foreach ($diponibilidades as $diponibilidad) {
                $total = Apartment::where('level',$level)->where('availability_id',$diponibilidad->id)->count();
                array_push($dataRow,[
                    'value' => $total,
                ]);
                $sumTotal += $total; 
            }
            array_push($dataRow,[
                'value' => $sumTotal,
            ]);
            array_push($dataBody,$dataRow);
        }
        $totals = array_fill(0, count($dataBody[0])-1, 0);;
        foreach ($dataBody as $row) {
            for ($i = 1; $i < count($row); $i++) {
                $totals[$i-1] += $row[$i]['value'];
            }
        }
        //grafico de barras
        $datasets = [
            'Available'=>[],
            'Blocked'=>[],
            'Other'=>[],
            'Reserved'=>[],
        ];
        // Recorremos la matriz y obtenemos los valores de la columna deseada
        foreach ($dataBody as $row) {
            $datasets['Available'][]  = $row[1]['value'];
            $datasets['Blocked'][] = $row[2]['value'];
            $datasets['Other'][] = $row[3]['value'];
            $datasets['Reserved'][] = $row[4]['value'];
        }

        //return compact('datasets','Available', 'dataBody','totals');
        return view('dashboard',compact('dataHeader', 'dataBody','totals','datasets'));
    }

    function apartments(Request $request) {
        $disponibilidades = Availability::get();
        return view('dashboard.apartmets',compact('disponibilidades'));
    }
    
}
