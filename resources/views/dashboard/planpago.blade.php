<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($planpago) ? 'Editar:': 'Crear:'}} {{ __('Plan de Pago Reservación') }}
        </h2>
    </x-slot>

    <x-slot name="head">
        @vite(['resources/js/planPago.js'])
    </x-slot>
    <div x-data="planPago" x-init="initData({{$planpago??null}})" class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <form @submit.prevent="guardarPlanPago" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-center text-2xl font-bold text-white bg-blue-900 mb-4 rounded-s">
                        PLAN DE PAGO
                    </h2>

                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <label class="form-label">NOMBRE DEL PROYECTO*</label>
                            <input x-model="nombre_proyecto" type="text" class="form-input" required/>
                        </div>
                        <div class="md:col-span-2">
                            <label class="form-label">DESCRIPCIÓN DEL PRODUCTO:</label>
                            <input x-model="descripcion" type="text" class="form-input"/>
                        </div>
                                       
                    </div>
                    <div class="grid lg:grid-cols-6 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="form-label">METROS ² CONSTRUCCIÓN*</label>
                            <input x-model.number="metros_construccion" type="number" class="form-input" required/>
                        </div>  
                        <div>
                            <label class="form-label">METROS ² SOLAR: </label>
                            <input x-model="metros_solar" type="number" class="form-input"/>
                        </div>
                        <div>
                            <label class="form-label">PISO</label>
                            <input x-model="piso" type="text" class="form-input"/>
                        </div>
                        <div>
                            <label class="form-label">MODULO</label>
                            <input x-model="modulo" type="text" class="form-input"/>
                        </div>
                        <div>
                            <label class="form-label">PARQUEO</label>
                            <input x-model="parqueo" type="text" class="form-input"/>
                        </div>
                        <div>
                            <label class="form-label">MANTENIMIENTO</label>
                            <input x-model="mantenimiento" type="text" class="form-input"/>
                        </div>
                        <div>
                            <label class="form-label">FECHA ENTREGA*</label>
                            <input x-model="fecha_entrega" type="date" class="form-input" required/>
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
                                        <input x-model="valor_propiedad" type="text" class="form-input text-end max-w-[200px]" placeholder="000.00" required/>
                                    </div>
                                </td>
                                <td>A: Monto total</td>
                            </tr>
                            <tr>
                                <td>RESERVA</td>
                                <td style="background-color: #99ccff;">B</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input x-model="reserva" id="reserva" value="2000" type="text" class="form-input text-end max-w-[200px]" placeholder="000.00" required/>
                                    </div>
                                </td>
                                <td>B: Monto de la reserva USD 2000</td>
                            </tr>
                            <tr>
                                <td>INICIAL</td>
                                <td style="background-color: #33cccc">C</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input x-model="inicial" id="inicial" value="00.00" type="text" class="form-input form-disable text-end max-w-[200px]" disabled required/>
                                    </div>
                                </td>
                                <td>
                                   <div> C: <input type="number" x-model="porcentaje_saldo" class="pb-0 pt-0 max-w-[90px] text-center" placeholder="0" min="1" />  % del Saldo - reserva = <span x-text="porcentaje_saldo"></span> % x (A-B)</div>
                                </td>
                            </tr>
                            <tr>
                                <td>MONTO DE LA CUOTA MENSUAL</td>
                                <td style="background-color: #333399; color:white">D</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input x-model="monto_cuota_mensual" id="cuota_mensual" type="text" class="form-input form-disable text-end max-w-[200px]" disabled />
                                    </div>
                                </td>

                                <td>D: 
                                    <input type="number" x-model="porcentaje_monto" class="pb-0 pt-0 max-w-[90px] text-center" placeholder="0" min="1" /> % del Monto total, 
                                    se paga en 
                                    <input type="number" x-model="numero_cuotas" class="pb-0 pt-0 max-w-[90px] text-center" placeholder="0" min="1" />
                                    cuotas iguales
                                </td>
                            </tr>
                            <tr>
                                <td>CONTRA ENTREGA</td>
                                <td style="background-color: #333399; color:white">E</td>
                                <td>
                                    <div class="flex justify-end w-full">
                                        <input x-model="contra_entrega" id="contra_entrega" type="text" class="form-input form-disable text-end max-w-[200px]" disabled/>
                                    </div>
                                </td>
                                <td>E: El monto a pagar es = A - B - C - (D x <span x-text="numero_cuotas"></span> )</td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex justify-center">
                        <button @click="calcularcuotas" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Calcular Cuotas</button>
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
                            <tbody>
                                <template x-for="(cuota, index) in lista_cuotas" :key="index">
                                    <tr class="text-center">
                                        <td x-text="index + 1"></td>
                                        <td x-text="'$ '+cuota.monto"></td>
                                        <td x-text="cuota.fecha"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-center text-sm font-bold text-white bg-blue-900 mb-4 rounded-s">
                        <br>
                    </h2>

                    <div class="relative overflow-x-auto flex justify-center mb-4">
                        <table class="table-bordered min-w-[570px]">
                            <tr>
                                <td>CONTRA ENTREGA:</td>
                                <td x-text="formatCurrency(contra_entrega)">$3.850.000,00 </td>
                            </tr>
                            <tr>
                                <td>ASESOR INMOBILIARIO:</td>
                                <td> 
                                    <input x-model="asesor" type="text" class="form-input" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>CLIENTE: </td>
                                <td>
                                    <input x-model="cliente" type="text" class="form-input" required/>
                                </td>
                            </tr>
                            <tr>
                                <td>FECHA ENVÍO PLAN DE PAGO: </td>
                                <td>
                                    <input x-model="fecha_envio_plan_pago" type="date" class="form-input"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex flex-col w-full items-center">
                        <textarea id="message" rows="7" class="max-w-[900px]  block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" x-model="terminos">
                        </textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button @click="descargarPreview" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            PDF Preview
                        </button>

                    </div>
                    <hr>
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar Plan de Pago</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>