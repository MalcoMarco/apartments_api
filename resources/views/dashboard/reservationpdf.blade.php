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
            font-size: 12px;
        }

        .bg-primary {
            background-color: #00305d;
            color: white;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        h1{
            font-size: 14px;
        }
        p{
            font-size: 12px;
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
    <header class="bg-primary">
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%;">
                    <h1>FORMULARIO DE RESERVA</h1>
                </td>
                <td style="width: 40%; text-align: right;">
                    {{-- <h4 style="margin-right: 3rem">FECHA: </h4> --}}
                </td>
                <td style="width: 10%; text-align: center;">
                    <img src="{{asset('images/kwlogo.png')}}" style="width: 55px;height: auto;" alt="logokw">
                </td>
            </tr>
        </table>
    </header>
    <section class="min-h-[300px]">
        {{-- <p style="margin-bottom: 1rem;">
            La entidad comercial KMG INTERNATIONAL, SRL, organizada y existente de conformidad con las leyes de la
            República Dominicana, provista del Registro
            Nacional de Contribuyentes No. 132-78471-5, con su domicilio social establecido en la Calle Benito Moncion
            No. 203. Edificio Alba 2do Nivel Local, SANTO
            DOMINGO, República Dominicana, representada por los señores DAVID MELCHOR SANCHEZ de nacionalidad española,
            mayor de edad, casado, portador
            de la cedula de identidad nº 402-2286363-7, domiciliado y residente en la ciudad de Santo domingo, y WILLIAM
            KING WONG de nacionalidad CANADIENSE
            portador del Pasaporte nro.___________________ en lo sucesivo llamado LA PROMOTORA, ha recibido del (la)
            ciudadano(a), Sr. / Sra.
            #¿NOMBRE?
        </p>

        <p>
            EL CLIENTE entrega la cantidad de DOS MIL DÓLARES (USD$ 2000), en depósito, transferencia o cheque Banco
            Popular Dominicano N°832884779, por concepto
            de RESERVA de la unidad del proyecto SAIKO Business & Corporate Center, ubicado en ...
        </p> --}}
    </section>
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
    <section>
        <table class="table-operacion">
            <tr>
                <td>VALOR DE LA PROPIEDAD</td>
                <td style="background-color: #ccccff;">A</td>
                <td>{{$valor_propiedad}}</td>
                <td>A: Monto total</td>
            </tr>
            <tr>
                <td>RESERVA</td>
                <td style="background-color: #99ccff;">B</td>
                <td>{{$reserva}}</td>
                <td>B: Monto de la reserva USD 2000</td>
            </tr>
            <tr>
                <td>INICIAL</td>
                <td style="background-color: #33cccc">C</td>
                <td>{{$inicial}}</td>
                <td>C: {{$porcentaje_saldo}}% del Saldo - reserva = {{$porcentaje_saldo}}% x (A-B)</td>
            </tr>
            <tr>
                <td>MONTO DE LA CUOTA MENSUAL</td>
                <td style="background-color: #333399; color:white">D</td>
                <td>{{$monto_cuota_mensual}}</td>
                <td>D: {{$porcentaje_monto}}% del Monto total, se paga en {{$numero_cuotas}} cuotas iguales</td>
            </tr>
            <tr>
                <td>CONTRA ENTREGA</td>
                <td style="background-color: #333399; color:white">E</td>
                <td>{{$contra_entrega}} </td>
                <td>E: El monto a pagar es = A - B - C - (D x {{$numero_cuotas}})</td>
            </tr>
        </table>
    </section>
    <div class="bg-primary">
        <br>
    </div>
    <section>
        <table class="table-pago" style="text-align: center;">
            <thead style="text-align: center;">
                <tr>
                    <th >Nro. Cuota</th>
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
    <section>
        <table class="table-pago">
            <tr>
                <td>CONTRA ENTREGA: </td>
                <td> {{$contra_entrega}} </td>
            </tr>
            <tr>
                <td>ASESOR INMOBILIARIO:</td>
                <td>{{$asesor}}</td>
            </tr>
            <tr>
                <td>CLIENTE: </td>
                <td>{{$cliente}}</td>
            </tr>
            <tr>
                <td>FECHA ENVÍO PLAN DE PAGO: </td>
                <td>{{$fecha_envio_plan_pago}} </td>
            </tr>
        </table>
    </section>
    <div class="bg-primary">
        <br>
    </div>
    <section>
        <p>{{$terminos}}      </p>
        <br><br><br>
        <div style="text-align: center;">
                <p>______________________________<br>
                <p>FIRMA DEL CLIENTE</p>
        </div>
    </section>
</body>

</html>