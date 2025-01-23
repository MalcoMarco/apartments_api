<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista Plan de Pago Reservación') }}
        </h2>
    </x-slot>

    <x-slot name="head">
        @vite(['resources/js/planPago.js'])
    </x-slot>
    <div x-data="listPlanPagos" x-init="initData" class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-right mb-4">
                        <a href="{{route('dashboard.planpago')}}"class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nuevo Plan </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg min-h-[300px]">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-100 uppercase bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            id
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Nombre del Proyecto
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            cliente
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            asesor
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Valor Propiedad
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Contra Entrega
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            created_At
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            OPTIONS
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-if="items.data.length==0">
                                    <tr class="min-h-[300px] bg-white text-black">
                                        <td colspan="100%" class="text-center">
                                            No se encontraron resultados
                                        </td>
                                    </tr>
                                </template>
                                <template x-for="item in items.data">
                                    <tr class="bg-white border-b text-gray-900 odd:bg-white even:bg-gray-50 ">
                                        <td class="px-6 py-4" x-text="item.id"></td>
                                        <td scope="row" x-text="item.nombre_proyecto"class="px-6 py-4 font-medium whitespace-nowrap"></td>
                                        <td class="px-6 py-4" x-text="item.cliente"></td>
                                        <td class="px-6 py-4" x-text="item.asesor"></td>
                                        <td class="px-6 py-4" x-text="item.valor_propiedad"></td>
                                        <td class="px-6 py-4" x-text="item.contra_entrega"></td>
                                        <td class="px-6 py-4" x-text="formatFecha(item.created_at)"></td>
                                        <td>
                                            <a :href="'/dashboard/plan-pago/' + item.id" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                                editar
                                            </a>
                                            <x-button @click="deleteItem(item.id)" variant="danger">
                                                <svg class="w-4 h-4" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                    <path
                                                        d="M170.5 51.6L151.5 80l145 0-19-28.4c-1.5-2.2-4-3.6-6.7-3.6l-93.7 0c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80 368 80l48 0 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 304c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80l0-304-8 0c-13.3 0-24-10.7-24-24S10.7 80 24 80l8 0 48 0 13.8 0 36.7-55.1C140.9 9.4 158.4 0 177.1 0l93.7 0c18.7 0 36.2 9.4 46.6 24.9zM80 128l0 304c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32l0-304L80 128zm80 64l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                </svg>
                                            </x-button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
                        aria-label="Table navigation">
                        <span
                            class="text-sm font-normal text-gray-50  mb-4 md:mb-0 block w-full md:inline md:w-auto">Mostrando
                            <span class="font-semibold text-white"x-text="items.from+'-'+items.to"></span> de
                            <span class="font-semibold text-white" x-text="items.total"></span></span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <template x-for="(item, index) in items.links">
                                <li>
                                    <button @click="changePage(item)"
                                        class="flex items-center justify-center px-3 h-8 leading-tight  bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                        :class="{ 'ms-0 rounded-s-lg': index == 0, 'rounded-e-lg': index + 1 == items.links
                                                .length, 'text-blue-600': item.active, 'text-gray-500': !item
                                            .active, 'cursor-not-allowed': item.url == null || item.active }"
                                        x-html="item.label"></button>
                                </li>
                            </template>
                        </ul>
                    </nav>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>