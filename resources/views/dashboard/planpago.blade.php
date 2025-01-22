<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan de Pago Reservación') }}
        </h2>
    </x-slot>
    <x-slot name="scripts">
        <script>
            function calcularcuotas(){
                let valor_propiedad = document.getElementById('valor_propiedad').value;
                let reserva = document.getElementById('reserva').value;
                let inicial = document.getElementById('inicial');
                let cuota_mensual = document.getElementById('cuota_mensual');
                let contra_entrega = document.getElementById('contra_entrega');
                let tobdy_cuotas = document.getElementById('tobdy_cuotas');
                const numero_cuotas = 20;
                let fecha = new Date();
                let fecha_cuota = new Date(fecha)

                inicial.value = (valor_propiedad - reserva) * 0.15;
                cuota_mensual.value = (valor_propiedad  * 0.30)/numero_cuotas;
                contra_entrega.value = valor_propiedad - reserva - inicial.value - (cuota_mensual.value * numero_cuotas);
                let tbodyString = '';
                for (let index = 0; index < numero_cuotas; index++) {
                    fecha_cuota.setMonth(fecha_cuota.getMonth() + 1);                    
                    tbodyString += `<tr>
                        <td>${index + 1}</td>
                        <td>$ ${cuota_mensual.value}</td>
                        <td>${fecha_cuota.toLocaleDateString()}</td>
                    </tr>`;
                }
                tobdy_cuotas.innerHTML = tbodyString;
            }
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-center text-2xl font-bold text-white bg-blue-900 mb-4 rounded-s">
                        PLAN DE PAGO
                    </h2>

                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <label for="first_name" class="form-label">NOMBRE DEL PROYECTO:</label>
                            <input type="text" id="first_name" class="form-input" value="SAIKO BUSINESS & CORPORATE CENTER" required />
                        </div>
                        <div class="md:col-span-2">
                            <label for="last_name" class="form-label">DESCRIPCIÓN DEL PRODUCTO:</label>
                            <input type="text" id="last_name" class="form-input" value="LOCAL COMERCIAL" required />
                        </div>
                                       
                    </div>
                    <div class="grid lg:grid-cols-6 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label for="company" class="form-label">METROS ² CONSTRUCCIÓN:</label>
                            <input type="number" id="company" class="form-input" value="40" />
                        </div>  
                        <div>
                            <label for="website" class="form-label">METROS ² SOLAR: </label>
                            <input type="text" id="website" class="form-input"  />
                        </div>
                        <div>
                            <label for="phone" class="form-label">PISO</label>
                            <input type="text" id="website" class="form-input"  />
                        </div>
                        <div>
                            <label for="phone" class="form-label">MODULO</label>
                            <input type="text" id="website" class="form-input"  />
                        </div>
                        <div>
                            <label for="phone" class="form-label">PARQUEO</label>
                            <input type="text" id="website" class="form-input"  />
                        </div>
                        <div>
                            <label for="phone" class="form-label">MANTENIMIENTO</label>
                            <input type="text" id="website" class="form-input"  />
                        </div>
                        <div>
                            <label for="phone" class="form-label">FECHA ENTREGA</label>
                            <input type="date" id="website" class="form-input"  />
                        </div> 
                    </div>
                    <h2 class="text-center text-2xl font-bold text-white bg-blue-900 mb-4 rounded-s">
                        OPERACIÓN (En Dólares Americanos USD)
                    </h2>
                    <div class="relative overflow-x-auto flex justify-center mb-4">
                        <table class="table-operacion table-bordered min-w-[570px]">
                            <tr>
                                <td>VALOR DE LA PROPIEDAD</td>
                                <td style="background-color: #ccccff;">A</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input id="valor_propiedad" type="text" class="form-input text-end max-w-[200px]" placeholder="000.00"/>
                                    </div>
                                </td>
                                <td>A: Monto total</td>
                            </tr>
                            <tr>
                                <td>RESERVA</td>
                                <td style="background-color: #99ccff;">B</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input id="reserva" type="text" class="form-input text-end max-w-[200px]" placeholder="000.00"/>
                                    </div>
                                </td>
                                <td>B: Monto de la reserva USD 2000</td>
                            </tr>
                            <tr>
                                <td>INICIAL</td>
                                <td style="background-color: #33cccc">C</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input id="inicial" value="00.00" type="text" class="form-input form-disable text-end max-w-[200px]" disabled/>
                                    </div>
                                </td>
                                <td>C: 15% del Saldo - reserva = 15% x (A-B)</td>
                            </tr>
                            <tr>
                                <td>MONTO DE LA CUOTA MENSUAL</td>
                                <td style="background-color: #333399; color:white">D</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input id="cuota_mensual" value="000.00" type="text" class="form-input form-disable text-end max-w-[200px]" disabled />
                                    </div>
                                </td>

                                <td>D: 30% del Monto total, se paga en 20 cuotas iguales</td>
                            </tr>
                            <tr>
                                <td>CONTRA ENTREGA</td>
                                <td style="background-color: #333399; color:white">E</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input id="contra_entrega" value="000.00" type="text" class="form-input form-disable text-end max-w-[200px]" disabled/>
                                    </div>
                                </td>
                                <td>E: El monto a pagar es = A - B - C - (D x 20)</td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex justify-center">
                        <button onclick="calcularcuotas()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Calcular Cuotas</button>
                    </div>

                    {{-- CUOTAS --}}
                    <h2 class="text-center text-sm font-bold text-white bg-blue-900 mb-4 rounded-s">
                        <br>
                    </h2>
                    <div class="relative overflow-x-auto flex justify-center mb-4">
                        <table class="table-bordered min-w-[570px]">
                            <thead>
                                <tr>
                                    <th>Nro. Cuota</th>
                                    <th>MONTO</th>
                                    <th>FECHA:</th>
                                </tr>
                            </thead>
                            <tbody id="tobdy_cuotas">
                                <tr>
                                    <td>1</td>
                                    <td>00.000,00$</td>
                                    <td>4/11/2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-center text-sm font-bold text-white bg-blue-900 mb-4 rounded-s">
                        <br>
                    </h2>

                    <div class="relative overflow-x-auto flex justify-center mb-4">
                        <table class="table-bordered min-w-[570px]">
                            <tr>
                                <td>CONTRA ENTREGA: </td>
                                <td>$3.850.000,00 </td>
                            </tr>
                            <tr>
                                <td>ASESOR INMOBILIARIO:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>CLIENTE: </td>
                                <td>JOHN DOE </td>
                            </tr>
                            <tr>
                                <td>FECHA ENVÍO PLAN DE PAGO: </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>