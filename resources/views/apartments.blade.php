@php
    $small_logo_light = App\Models\WebConfig::where('name', 'small_logo_light')->first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/apartments.js'])
</head>

<body class="font-sans antialiased bg-primary text-white">
    <main x-data="apartmentData()" x-init="initApartments" x-on:orderBy="orderBy" class="min-h-screen pt-2">
        <div class="flex items-center flex-col mb-6">
            <a href="/"><img src="{{$small_logo_light->value}}" class="w-auto h-20" alt="logo"></a>
            <p>SAIKO BUSINESS & CORPORATE CENTER</p>
        </div>


    
        <div class="w-full px-4 mb-6">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg min-h-[300px]">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    LEVEL #
                                    <button id="dropdownLevelbtn" data-dropdown-toggle="dropdownLevel" type="button">
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownLevel" class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdownLevelbtn">
                                            <li>
                                                <button @click="orderBy('-level')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                            </li>
                                            <li>
                                                <button @click="orderBy('level')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                            </li>
                                        </ul>
                                        <div class="px-3 mb-3">
                                            <label for="input-group-level" class="sr-only">Search</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                                </div>
                                                <input x-model="filter.level" x-on:input.debounce.500ms="search"  type="number" id="input-group-level" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="buscar">
                                            </div>
                                        </div>
                                        <div class="w-full px-3 text-right mb-2" x-show="filter.level">
                                            <button @click="resetColum('level')" class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    MÓDULO ID
                                    <button id="dropdownapartment_idbtn" data-dropdown-toggle="dropdownapartment_id" type="button">
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownapartment_id" class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdownapartment_idbtn">
                                            <li>
                                                <button @click="orderBy('-apartment_id')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                            </li>
                                            <li>
                                                <button @click="orderBy('apartment_id')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                            </li>
                                        </ul>
                                        <div class="px-3 mb-3">
                                            <label for="input-group-apartment_id" class="sr-only">Search</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                                </div>
                                                <input x-model="filter.apartment_id" x-on:input.debounce.500ms="search"  type="text" id="input-group-apartment_id" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="buscar">
                                            </div>
                                        </div>
                                        <div class="w-full px-3 text-right mb-2" x-show="filter.apartment_id">
                                            <button @click="resetColum('apartment_id')" class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    M2
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    PRICE/m2
                                    <button id="dropdownpricebtn" data-dropdown-toggle="dropdownprice" type="button">
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownprice" class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdownpricebtn">
                                            <li>
                                                <button @click="orderBy('-price')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                            </li>
                                            <li>
                                                <button @click="orderBy('price')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                            </li>
                                        </ul>
                                        <div class="px-3 mb-3">
                                            <label for="input-group-price" class="sr-only">Search</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                                </div>
                                                <input x-model="filter.price" x-on:input.debounce.500ms="search"  type="text" id="input-group-price" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="buscar">
                                            </div>
                                        </div>
                                        <div class="w-full px-3 text-right mb-2" x-show="filter.price">
                                            <button @click="resetColum('price')" class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    TOTAL AMOUNT
                                    <button id="dropdowntotal_amountbtn" data-dropdown-toggle="dropdowntotal_amount" type="button">
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdowntotal_amount" class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdowntotal_amountbtn">
                                            <li>
                                                <button @click="orderBy('-total_amount')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Descendentemente</button>
                                            </li>
                                            <li>
                                                <button @click="orderBy('total_amount')" class="w-full block px-4 py-2 hover:bg-gray-600 hover:text-white">Ascendentemente</button>
                                            </li>
                                        </ul>
                                        <div class="px-3 mb-3">
                                            <label for="input-group-total_amount" class="sr-only">Search</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                                </svg>
                                                </div>
                                                <input x-model="filter.total_amount" x-on:input.debounce.500ms="search"  type="text" id="input-group-total_amount" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="buscar">
                                            </div>
                                        </div>
                                        <div class="w-full px-3 text-right mb-2" x-show="filter.total_amount">
                                            <button @click="resetColum('total_amount')" class="text-red-500 p-1 bg-white rounded-md hover:bg-red-500 hover:text-white">
                                                <svg class="w-5 h-5" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-320c0-8.8-7.2-16-16-16L64 80zM0 96C0 60.7 28.7 32 64 32l384 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    ¿AVAILABILITY?
                                    <button id="dropdownavailability_idbtn" data-dropdown-toggle="dropdownavailability_id" type="button">
                                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownavailability_id" class="z-10 hidden rounded-lg shadow w-44 bg-gray-700">
                                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">
                                            @foreach ($disponibilidades as $item)
                                                <li>
                                                    <div class="flex items-center p-2 rounded hover:bg-gray-600">
                                                        <input x-model="filter.availability_id" x-on:change="search" id="checkbox-item-{{$item->id}}" type="checkbox" value="{{$item->id}}" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700  bg-gray-600 border-gray-500">
                                                        <label for="checkbox-item-{{$item->id}}" class="w-full ms-2 text-sm font-medium rounded text-gray-300">{{$item->name}}</label>
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
                                <th scope="row" x-text="item.apartment_id" class="px-6 py-4 font-medium whitespace-nowrap">
                                </th>
                                <td class="px-6 py-4" x-text="item.square_meters">
                                </td>
                                <td class="px-6 py-4" x-text="item.price">
                                </td>
                                <td class="px-6 py-4" x-text="item.total_amount">
                                </td>
                                <td class="px-6 py-4" x-text="item.availability.name">
                                </td>
                                <td class="px-6 py-4" x-text="item.comments">
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-50  mb-4 md:mb-0 block w-full md:inline md:w-auto">Mostrando <span class="font-semibold text-white"x-text="apartments.from+'-'+apartments.to"></span> de <span class="font-semibold text-white" x-text="apartments.total"></span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <template x-for="(item, index) in apartments.links">
                        <li>
                            <button @click="changePage(item)" class="flex items-center justify-center px-3 h-8 leading-tight  bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" 
                            :class="{'ms-0 rounded-s-lg':index==0,'rounded-e-lg':index+1==apartments.links.length,'text-blue-600':item.active, 'text-gray-500':!item.active,'cursor-not-allowed':item.url==null || item.active}"
                            x-html="item.label"></button>
                        </li>
                    </template>        
                </ul>
            </nav>
        </div>
        @include("layouts.footer")
    </main>
</body>

</html>
