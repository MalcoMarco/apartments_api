<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="PlanPago",
 *     type="object",
 *     title="PlanPago",
 *     description="Modelo que representa un plan de pago",
 *     @OA\Property(
 *         property="valor_propiedad",
 *         type="number",
 *         description="Valor de la propiedad"
 *     ),
 *     @OA\Property(
 *         property="reserva",
 *         type="number",
 *         description="Monto de la reserva"
 *     ),
 *     @OA\Property(
 *         property="porcentaje_saldo",
 *         type="number",
 *         description="Porcentaje del saldo"
 *     ),
 *     @OA\Property(
 *         property="porcentaje_monto",
 *         type="number",
 *         description="Porcentaje del monto"
 *     ),
 *     @OA\Property(
 *         property="numero_cuotas",
 *         type="integer",
 *         description="Número de cuotas"
 *     ),
 *     @OA\Property(
 *         property="fecha_entrega",
 *         type="string",
 *         format="date",
 *         description="Fecha de entrega"
 *     ),
 *     @OA\Property(
 *         property="inicial",
 *         type="number",
 *         description="Monto inicial"
 *     ),
 *     @OA\Property(
 *         property="monto_cuota_mensual",
 *         type="number",
 *         description="Monto de la cuota mensual"
 *     ),
 *     @OA\Property(
 *         property="contra_entrega",
 *         type="number",
 *         description="Monto contra entrega"
 *     ),
 *     @OA\Property(
 *         property="lista_cuotas",
 *         type="string",
 *         description="Lista de cuotas"
 *     ),
 *     @OA\Property(
 *         property="asesor",
 *         type="string",
 *         description="Nombre del asesor"
 *     ),
 *     @OA\Property(
 *         property="cliente",
 *         type="string",
 *         description="Nombre del cliente"
 *     ),
 *     @OA\Property(
 *         property="fecha_envio_plan_pago",
 *         type="string",
 *         format="date",
 *         description="Fecha de envío del plan de pago"
 *     ),
 *     @OA\Property(
 *         property="nombre_proyecto",
 *         type="string",
 *         description="Nombre del proyecto"
 *     ),
 *     @OA\Property(
 *         property="descripcion",
 *         type="string",
 *         description="Descripción del plan de pago"
 *     ),
 *     @OA\Property(
 *         property="metros_construccion",
 *         type="number",
 *         description="Metros de construcción"
 *     ),
 *     @OA\Property(
 *         property="metros_solar",
 *         type="number",
 *         description="Metros del solar"
 *     ),
 *     @OA\Property(
 *         property="piso",
 *         type="string",
 *         description="Piso del inmueble"
 *     ),
 *     @OA\Property(
 *         property="modulo",
 *         type="string",
 *         description="Módulo del inmueble"
 *     ),
 *     @OA\Property(
 *         property="parqueo",
 *         type="string",
 *         description="Parqueo del inmueble"
 *     ),
 *     @OA\Property(
 *         property="mantenimiento",
 *         type="number",
 *         description="Costo de mantenimiento"
 *     )
 * )
 */

class PlanPago extends Model
{
    use HasFactory;
    protected $fillable =[
        'valor_propiedad',
        'reserva',
        'porcentaje_saldo',
        'porcentaje_monto',
        'numero_cuotas',
        'fecha_entrega',
        'inicial',
        'monto_cuota_mensual',
        'contra_entrega',
        'lista_cuotas',
        'asesor',
        'cliente',
        "fecha_envio_plan_pago",
        "nombre_proyecto",
        "descripcion",
        "metros_construccion",
        "metros_solar",
        "piso",
        "modulo",
        "parqueo",
        "mantenimiento",
        "fecha_entrega",
    ];
}
