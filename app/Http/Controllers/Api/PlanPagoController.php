<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlanPago;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use PDF;
class PlanPagoController extends Controller
{
    
    /**
     * @OA\Post(
     *     path="/api/calcular-cuotas",
     *     summary="Calcular cuotas de un plan de pago",
     *     tags={"PlanPago"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"valor_propiedad", "reserva", "porcentaje_saldo", "porcentaje_monto", "numero_cuotas", "fecha_entrega"},
     *             @OA\Property(property="valor_propiedad", type="number", format="float", example=7000000, description="Valor de la propiedad"),
     *             @OA\Property(property="reserva", type="number", format="float", example=20000, description="Monto de la reserva"),
     *             @OA\Property(property="porcentaje_saldo", type="number", format="float", example=15, description="Porcentaje del saldo"),
     *             @OA\Property(property="porcentaje_monto", type="number", format="float", example=30, description="Porcentaje del monto"),
     *             @OA\Property(property="numero_cuotas", type="integer", example=12, description="Número de cuotas"),
     *             @OA\Property(property="fecha_entrega", type="string", format="date", example="2023-12-01", description="Fecha de entrega")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cálculo de cuotas exitoso",
     *         @OA\JsonContent(
     *             @OA\Property(property="inicial", type="number", format="float", example=18000, description="Monto inicial"),
     *             @OA\Property(property="monto_cuota_mensual", type="number", format="float", example=6666.67, description="Monto de la cuota mensual"),
     *             @OA\Property(property="contra_entrega", type="number", format="float", example=20000, description="Monto contra entrega"),
     *             @OA\Property(
     *                 property="lista_cuotas",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="numero", type="integer", example=1, description="Número de la cuota"),
     *                     @OA\Property(property="fecha", type="string", format="date", example="2024-01-01", description="Fecha de la cuota"),
     *                     @OA\Property(property="monto", type="number", format="float", example=6666.67, description="Monto de la cuota")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Solicitud inválida"
     *     )
     * )
     */
    function calcularCuotas(Request $request) {
        $this->validate($request,[
            'valor_propiedad' => 'required|numeric',
            'reserva' => 'required|numeric',
            'porcentaje_saldo' => 'required|numeric',
            'porcentaje_monto' => 'required|numeric',
            'numero_cuotas' => 'required|numeric',
            'fecha_entrega' => 'required|date',
        ]);

        $valor_propiedad = $request->valor_propiedad;
        $reserva = $request->reserva;
        $porcentaje_saldo = $request->porcentaje_saldo;
        $porcentaje_monto = $request->porcentaje_monto;
        $numero_cuotas = $request->numero_cuotas;
        $fecha_entrega = $request->fecha_entrega;

        $inicial = ($valor_propiedad - $reserva) * ($porcentaje_saldo/100);
        $monto_cuota_mensual = ($valor_propiedad  * ($porcentaje_monto/100)) / $numero_cuotas;
        $contra_entrega = $valor_propiedad - $reserva - $inicial - ($monto_cuota_mensual * $numero_cuotas);

        $lista_cuotas = [];

        for ($i=0; $i < $numero_cuotas; $i++) { 
            $cuota = [
                'numero' => $i+1,
                'fecha' => date('d/m/Y', strtotime($fecha_entrega)),
                'monto' => number_format($monto_cuota_mensual, 2, '.', ','),
            ];
            array_push($lista_cuotas,$cuota);
            $fecha_entrega = date('Y-m-d',strtotime($fecha_entrega.' + 1 month'));
        }

        return response()->json([
            'inicial' => $inicial,
            'monto_cuota_mensual' => $monto_cuota_mensual,
            'contra_entrega' => $contra_entrega,
            'lista_cuotas' => $lista_cuotas,
        ]);

    }
 
    /**
     * @OA\Post(
     *     path="/api/plan-pago",
     *     summary="Crear un nuevo plan de pago",
     *     tags={"PlanPago"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"valor_propiedad", "reserva", "porcentaje_saldo", "porcentaje_monto", "numero_cuotas", "fecha_entrega", "inicial", "monto_cuota_mensual", "contra_entrega", "lista_cuotas", "asesor", "fecha_envio_plan_pago"},
     *             @OA\Property(property="valor_propiedad", type="number", format="float", example=100000),
     *             @OA\Property(property="reserva", type="number", format="float", example=5000),
     *             @OA\Property(property="porcentaje_saldo", type="number", format="float", example=20),
     *             @OA\Property(property="porcentaje_monto", type="number", format="float", example=80),
     *             @OA\Property(property="numero_cuotas", type="number", format="integer", example=12),
     *             @OA\Property(property="fecha_entrega", type="string", format="date", example="2023-12-31"),
     *             @OA\Property(property="inicial", type="number", format="float", example=20000),
     *             @OA\Property(property="monto_cuota_mensual", type="number", format="float", example=5000),
     *             @OA\Property(property="contra_entrega", type="number", format="float", example=30000),
     *             @OA\Property(property="lista_cuotas", type="string", example="Lista de cuotas en formato JSON:[{numero:1,fecha:'2024-01-01',monto:5000},{numero:2,fecha:'2024-02-01',monto:5000}]"),
     *             @OA\Property(property="asesor", type="string", example="Juan Perez"),
     *             @OA\Property(property="cliente", type="string", example="Maria Lopez"),
     *             @OA\Property(property="fecha_envio_plan_pago", type="string", format="date", example="2023-10-01"),
     *             @OA\Property(property="nombre_proyecto", type="string", example="Proyecto XYZ"),
     *             @OA\Property(property="descripcion", type="string", example="Descripción del proyecto"),
     *             @OA\Property(property="metros_construccion", type="number", format="float", example=120.5),
     *             @OA\Property(property="metros_solar", type="number", format="float", example=200.75),
     *             @OA\Property(property="piso", type="string", example="3"),
     *             @OA\Property(property="modulo", type="string", example="A"),
     *             @OA\Property(property="parqueo", type="string", example="2"),
     *             @OA\Property(property="mantenimiento", type="string", example="1000")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Plan de pago creado exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Plan de pago creado exitosamente"),
     *             @OA\Property(property="plan_pago", type="object", ref="#/components/schemas/PlanPago")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Datos de entrada no válidos"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    function store(Request $request) {
        $this->validate($request,[
            'valor_propiedad' => 'required|numeric',
            'reserva' => 'required|numeric',
            'porcentaje_saldo' => 'required|numeric',
            'porcentaje_monto' => 'required|numeric',
            'numero_cuotas' => 'required|numeric',
            'fecha_entrega' => 'required|date',
            'inicial' => 'required|numeric',
            'monto_cuota_mensual' => 'required|numeric',
            'contra_entrega' => 'required|numeric',
            'lista_cuotas' => 'required',
            'asesor' => 'required|string',
            'cliente' => 'nullable|string',
            'fecha_envio_plan_pago' => 'required|date',
            'nombre_proyecto' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'metros_construccion' => 'nullable|numeric',
            'metros_solar' => 'nullable|numeric',
            'piso' => 'nullable|string',
            'modulo' => 'nullable|string',
            'parqueo' => 'nullable|string',
            'mantenimiento' => 'nullable|string',
        ]);

        $planPago = PlanPago::create($request->all());

        return response()->json([
            'message' => 'Plan de pago creado exitosamente',
            'plan_pago' => $planPago,
        ]);
    }

    public function index(Request $request)
    {
        $plan_pagos = QueryBuilder::for(PlanPago::class)
        ->allowedFilters([
            AllowedFilter::exact('fecha_entrega'),
            'id',
            AllowedFilter::exact('valor_propiedad'),
            AllowedFilter::exact('numero_cuotas'),
            AllowedFilter::exact('contra_entrega'),
            AllowedFilter::exact('cliente'),
            AllowedFilter::exact('asesor')
        ])
        // ->allowedSorts([
        //     'level','apartment_id','price','total_amount','availability_id'
        // ])
        ->orderBy('id', 'desc')
        ->paginate($request->input('per_page', 100));

        return response()->json($plan_pagos);
    }

    function getPlanPagoById(Request $request, PlanPago $planpago) {
        return response()->json($planpago);        
    }

    function updatePlanpago(Request $request, PlanPago $planpago) {
        $this->validate($request,[
            'valor_propiedad' => 'required|numeric',
            'reserva' => 'required|numeric',
            'porcentaje_saldo' => 'required|numeric',
            'porcentaje_monto' => 'required|numeric',
            'numero_cuotas' => 'required|numeric',
            'fecha_entrega' => 'required|date',
            'inicial' => 'required|numeric',
            'monto_cuota_mensual' => 'required|numeric',
            'contra_entrega' => 'required|numeric',
            'lista_cuotas' => 'required',
            'asesor' => 'required|string',
            'cliente' => 'nullable|string',
            'fecha_envio_plan_pago' => 'required|date',
            'nombre_proyecto' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'metros_construccion' => 'nullable|numeric',
            'metros_solar' => 'nullable|numeric',
            'piso' => 'nullable|string',
            'modulo' => 'nullable|string',
            'parqueo' => 'nullable|string',
            'mantenimiento' => 'nullable|string',
        ]);
        $planpago->update($request->all());
        return response()->json([
            'message' => 'Plan de pago actualizado exitosamente',
            'plan_pago' => $planpago,
        ]);
    }

    function planPagoPreview(Request $request) {
        //$planpago = PlanPago::find(2)->toArray();
        $planpago = $request->input('planpago');
        $planpago['lista_cuotas'] = json_decode($planpago['lista_cuotas']);
        //dd($planpago);
        $pdf = PDF::loadView('dashboard.reservationpdf', $planpago);

        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, 'reservations.pdf');
    }

    function deletePlanPago(Request $request, PlanPago $planpago) {
        $planpago->delete();
        return response()->json([
            'message' => 'Plan de pago eliminado exitosamente',
        ]);
    }

}
