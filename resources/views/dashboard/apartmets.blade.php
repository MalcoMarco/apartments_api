<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apartments') }}
        </h2>
    </x-slot>

    <div x-data="apartmentData" x-init="initApartments" class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg min-h-[300px]">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-100 uppercase bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            LEVEL #
                                            <button id="dropdownLevelbtn" data-dropdown-toggle="dropdownLevel"
                                                type="button">
                                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownLevel"
                                                class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-200"
                                                    aria-labelledby="dropdownLevelbtn">
                                                    <li>
                                                        <button @click="orderBy('-level')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                                    </li>
                                                    <li>
                                                        <button @click="orderBy('level')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                                    </li>
                                                </ul>
                                                <div class="px-3 mb-3">
                                                    <label for="input-group-level" class="sr-only">Search</label>
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                            </svg>
                                                        </div>
                                                        <input x-model.number="filter.level"
                                                            x-on:input.debounce.500ms="search" type="number"
                                                            id="input-group-level"
                                                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="buscar">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 text-right mb-2" x-show="filter.level">
                                                    <button @click="resetColum('level')"
                                                        class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                        <svg class="w-5 h-5" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            APARTMENT ID
                                            <button id="dropdownapartment_idbtn"
                                                data-dropdown-toggle="dropdownapartment_id" type="button">
                                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownapartment_id"
                                                class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-200"
                                                    aria-labelledby="dropdownapartment_idbtn">
                                                    <li>
                                                        <button @click="orderBy('-apartment_id')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                                    </li>
                                                    <li>
                                                        <button @click="orderBy('apartment_id')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                                    </li>
                                                </ul>
                                                <div class="px-3 mb-3">
                                                    <label for="input-group-apartment_id" class="sr-only">Search</label>
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                            </svg>
                                                        </div>
                                                        <input x-model="filter.apartment_id"
                                                            x-on:input.debounce.500ms="search" type="text"
                                                            id="input-group-apartment_id"
                                                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="buscar">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 text-right mb-2" x-show="filter.apartment_id">
                                                    <button @click="resetColum('apartment_id')"
                                                        class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                        <svg class="w-5 h-5" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            PRICE/m2
                                            <button id="dropdownpricebtn" data-dropdown-toggle="dropdownprice"
                                                type="button">
                                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownprice"
                                                class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-200"
                                                    aria-labelledby="dropdownpricebtn">
                                                    <li>
                                                        <button @click="orderBy('-price')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                                    </li>
                                                    <li>
                                                        <button @click="orderBy('price')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                                    </li>
                                                </ul>
                                                <div class="px-3 mb-3">
                                                    <label for="input-group-price" class="sr-only">Search</label>
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                            </svg>
                                                        </div>
                                                        <input x-model="filter.price"
                                                            x-on:input.debounce.500ms="search" type="text"
                                                            id="input-group-price"
                                                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="buscar">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 text-right mb-2" x-show="filter.price">
                                                    <button @click="resetColum('price')"
                                                        class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                        <svg class="w-5 h-5" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            TOTAL AMOUNT
                                            <button id="dropdowntotal_amountbtn"
                                                data-dropdown-toggle="dropdowntotal_amount" type="button">
                                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdowntotal_amount"
                                                class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-200"
                                                    aria-labelledby="dropdowntotal_amountbtn">
                                                    <li>
                                                        <button @click="orderBy('-total_amount')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                                    </li>
                                                    <li>
                                                        <button @click="orderBy('total_amount')"
                                                            class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                                    </li>
                                                </ul>
                                                <div class="px-3 mb-3">
                                                    <label for="input-group-total_amount"
                                                        class="sr-only">Search</label>
                                                    <div class="relative">
                                                        <div
                                                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                            </svg>
                                                        </div>
                                                        <input x-model="filter.total_amount"
                                                            x-on:input.debounce.500ms="search" type="text"
                                                            id="input-group-total_amount"
                                                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="buscar">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 text-right mb-2" x-show="filter.total_amount">
                                                    <button @click="resetColum('total_amount')"
                                                        class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                        <svg class="w-5 h-5" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <path
                                                                d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            ¿AVAILABILITY?
                                            <button id="dropdownavailability_idbtn"
                                                data-dropdown-toggle="dropdownavailability_id" type="button">
                                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownavailability_id"
                                                class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownBgHoverButton">
                                                    @foreach ($disponibilidades as $item)
                                                        <li>
                                                            <div
                                                                class="flex items-center p-2 rounded hover:bg-gray-600">
                                                                <input x-model="filter.availability_id"
                                                                    x-on:change="search"
                                                                    id="checkbox-item-{{ $item->id }}"
                                                                    type="checkbox" value="{{ $item->id }}"
                                                                    class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700  bg-gray-600 border-gray-500">
                                                                <label for="checkbox-item-{{ $item->id }}"
                                                                    class="w-full ms-2 text-sm font-medium rounded text-gray-300">{{ $item->name }}</label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            COMMENTS
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
                                <template x-if="apartments.data.length==0">
                                    <tr class="min-h-[300px] bg-white text-black">
                                        <td colspan="100%" class="text-center">
                                            No se encontraron resultados
                                        </td>
                                    </tr>
                                </template>
                                <template x-for="item in apartments.data">
                                    <tr class="bg-white border-b text-gray-900 odd:bg-white even:bg-gray-50 ">
                                        <td class="px-6 py-4" x-text="item.level">
                                        </td>
                                        <th scope="row" x-text="item.apartment_id"
                                            class="px-6 py-4 font-medium whitespace-nowrap">
                                        </th>
                                        <td class="px-6 py-4" x-text="item.price">
                                        </td>
                                        <td class="px-6 py-4" x-text="item.total_amount">
                                        </td>
                                        <td class="px-6 py-4" x-text="item.availability.name">
                                        </td>
                                        <td class="px-6 py-4" x-text="item.comments">
                                        </td>
                                        <td>
                                            <x-button @click="editForm(item)" variant="warning">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </x-button>
                                            <x-button variant="danger">
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
                            <span class="font-semibold text-white"x-text="apartments.from+'-'+apartments.to"></span> de
                            <span class="font-semibold text-white" x-text="apartments.total"></span></span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <template x-for="(item, index) in apartments.links">
                                <li>
                                    <button @click="changePage(item)"
                                        class="flex items-center justify-center px-3 h-8 leading-tight  bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                        :class="{ 'ms-0 rounded-s-lg': index == 0, 'rounded-e-lg': index + 1 == apartments.links
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
        <div id="modalEl" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative max-h-full w-full max-w-2xl">
                <!-- Modal content -->
                <form @submit.prevent="storeForm" class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <!-- Modal body -->
                    <div class="space-y-6 p-6 ">
                        <h1 x-text="modalTitle" class="text-xl font-bold dark:text-white"></h1>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="mb-1">
                                <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level #</label>
                                <input x-model.number="apartmentItem.level" type="number" id="level" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="level" required min="1"/>
                              </div>
                              <div x-show="isformCreate" class="mb-1">
                                <label for="apartment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apartment Id</label>
                                <input x-model="apartmentItem.apartment_id" type="text" id="apartment_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="L-000" required />
                              </div>
                              <div class="mb-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input x-model="apartmentItem.price" type="text" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="000.00" required />
                              </div>
                              <div class="mb-1">
                                <label for="total_amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Amount</label>
                                <input x-model="apartmentItem.total_amount" type="text" id="total_amount" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="000.00" required />
                              </div>
                              <div class="mb-1">
                                <label for="availability_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Availability</label>
                                <select x-model="apartmentItem.availability_id" id="availability_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($disponibilidades as $item)
                                        <option value="{{$item->id}}">{{$item->name}} </option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your comment</label>
                            <textarea x-model="apartmentItem.comments" id="comment" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center space-x-2 rtl:space-x-reverse rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                        <button type="submit"
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Guardar
                        </button>
                        <button @click="closeForm" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div id="toast-top-right" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow top-5 right-5 dark:text-gray-400 dark:divide-gray-700 dark:bg-gray-800" role="alert">
            <div class="text-sm font-normal">Top right positioning.</div>
        </div> --}}

        <div id="toast-warning" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 top-5 right-5 text-gray-500 bg-white rounded-lg shadow border border-orange-400" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Improve password difficulty.</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    <x-slot name="head">
        @vite(['resources/js/apartments.js'])
    </x-slot>
</x-app-layout>
