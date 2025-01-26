<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        .bg-primary {
            background-color: rgb(35 56 118);
            color: white;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        h1{
            font-size: 12px;
        }
        p{
            font-size: 10px;
        }
        .txt-center {
            text-align: center;
        }

        section {
            padding: 20px;
        }

        .table-pago {
            border-collapse: collapse;
        }

        .table-pago th,
        .table-pago td {
            padding: 5px;
        }

        .table-pago th {
            text-align: left;
        }

        .table-operacion {
            border-collapse: collapse;
            width: 100%;
        }

        .table-operacion th,
        .table-operacion td {
            padding: 5px;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #d6e2eb;

        }
        .table-operacion th {
            text-align: left;
        }

        .table-operacion tr td:nth-child(2) {
            font-weight: bold;
            text-align: center;
            font-size: 14px;
        }

        .table-operacion tr td:nth-child(3) {
            font-weight: bold;
            text-align: right;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header class="bg-primary" style="margin-bottom: .5rem;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <h1>FORMULARIO DE RESERVA</h1>
                </td>
                <td style="width: 40%; text-align: right;">
                    {{-- <h4 style="margin-right: 3rem">FECHA: </h4> --}}
                </td>
                <td style="width: 10%; text-align: center;">
                    <img src="https://disponibilidad.saiko.com.do/images/kwlogo.png" style="width: 55px;height: auto;" alt="logokw">
                </td>
            </tr>
        </table>
    </header>
    <h1 class="bg-primary txt-center" style="padding: .5rem 0px"> PLAN DE PAGO </h1>
    <section>
        <table class="table-pago">
            <tr>
                <th>NOMBRE DEL PROYECTO:</th>
                <td>{{$nombre_proyecto}} </td>
            </tr>
            <tr>
                <th>DESCRIPCIÓN DEL PRODUCTO:</th>
                <td>{{$descripcion}}</td>
            </tr>
            <tr>
                <th>METROS ² CONSTRUCCIÓN:</th>
                <td>{{$metros_construccion}}</td>
            </tr>
            <tr>
                <th>METROS ² SOLAR: </th>
                <td>{{$metros_solar}} </td>
            </tr>
            <tr>
                <th>PISO</th>
                <td>{{$piso}} </td>
            </tr>
            <tr>
                <th>MODULO</th>
                <td>{{$modulo}} </td>
            </tr>
            <tr>
                <th>PARQUEO:</th>
                <td>{{$parqueo}} </td>
            </tr>
            <tr>
                <th>MANTENIMIENTO:</th>
                <td>{{$mantenimiento}} </td>
            </tr>
            <tr>
                <th>FECHA ENTREGA:</th>
                <td>{{$fecha_entrega}} </td>
            </tr>
        </table>
    </section>
    <h1 class="bg-primary txt-center" style="padding: .5rem 0px"> OPERACÍON (En Dólares Americanos USD) </h1>
    <section style="width: 100%; text-align: center;">
        <table class="table-operacion" style="margin: 0 auto;">
            <tr>
                <th>VALOR DE LA PROPIEDAD</th>
                <td style="background-color: #ccccff;">A</td>
                <td>{{$valor_propiedad}}</td>
                <td>A: Monto total</td>
            </tr>
            <tr>
                <th>RESERVA</th>
                <td style="background-color: #99ccff;">B</td>
                <td>{{$reserva}}</td>
                <td>B: Monto de la reserva USD 2000</td>
            </tr>
            <tr>
                <th>INICIAL</th>
                <td style="background-color: #33cccc">C</td>
                <td>{{$inicial}}</td>
                <td>C: {{$porcentaje_saldo}}% del Saldo - reserva = {{$porcentaje_saldo}}% x (A-B)</td>
            </tr>
            <tr>
                <th>MONTO DE LA CUOTA MENSUAL</th>
                <td style="background-color: #333399; color:white">D</td>
                <td>{{$monto_cuota_mensual}}</td>
                <td>D: {{$porcentaje_monto}}% del Monto total, se paga en {{$numero_cuotas}} cuotas iguales</td>
            </tr>
            <tr>
                <th>CONTRA ENTREGA</th>
                <td style="background-color: #333399; color:white">E</td>
                <td>{{$contra_entrega}} </td>
                <td>E: El monto a pagar es = A - B - C - (D x {{$numero_cuotas}})</td>
            </tr>
        </table>
    </section>
    <div class="bg-primary">
        <br>
    </div>
    <section style="width: 100%; text-align: center;">
        <table class="table-pago table-bordered" style="text-align: center; margin: 0 auto;">
            <thead style="text-align: center;">
                <tr>
                    <th>Nro. Cuota</th>
                    <th style="min-width: 150px;text-align: center;">MONTO</th>
                    <th style="min-width: 150px;text-align: center;">FECHA:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lista_cuotas as $cuota)
                    <tr>
                        <td>{{$cuota->numero}}</td>
                        <td>{{$cuota->monto}}</td>
                        <td>{{$cuota->fecha}}</td>
                    </tr>                    
                @endforeach
            </tbody>
        </table>
    </section>
    <div class="bg-primary">
        <br>
    </div>
    <section style="width: 100%;">
        <table class="table-pago table-bordered" style="text-align: center; margin: 0 auto;">
            <tr>
                <th>CONTRA ENTREGA: </th>
                <td> {{$contra_entrega}} </td>
            </tr>
            <tr>
                <th>ASESOR INMOBILIARIO:</th>
                <td>{{$asesor}}</td>
            </tr>
            <tr>
                <th>CLIENTE: </th>
                <td>{{$cliente}}</td>
            </tr>
            <tr>
                <th>FECHA ENVÍO PLAN DE PAGO: </th>
                <td>{{$fecha_envio_plan_pago}} </td>
            </tr>
        </table>
    </section>
    <div class="bg-primary">
        <br>
    </div>
    <section style="padding: 1rem 3rem;"> 
        <p style="text-align: justify;">{{$terminos}}</p>
        <br><br><br>
        <div style="text-align: center;">
                <p style="margin-bottom: 1.5rem">______________________________<br>
                <p>FIRMA DEL CLIENTE</p>
        </div>
    </section>
</body>

</html>