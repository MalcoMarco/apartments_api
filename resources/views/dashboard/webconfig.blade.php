<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('configuracíon web') }}
        </h2>
    </x-slot>
    <x-slot name="head">
        @vite(['resources/js/dashboard/webconfig.js'])
    </x-slot>
    <div x-data="webconfig" x-init="resetInputsfiles" class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3> Imagenes/Logos</h3>
                    @json($webConfigs)
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-16 py-3">
                                        <span class="sr-only">Image</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4">
                                        <div class="bg-gray-200 w-max"><img src="{{$webConfigs['home_logo']}}" class="w-16 md:w-32 max-w-full max-h-full" alt="home_logo"></div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        Home Logo
                                    </td>
                                    <td class="px-6 py-4">
                                        <label for="home_logo" class="font-medium text-blue-600 dark:text-blue-500 hover:underline flex items-center gap-1 cursor-pointer">
                                            <x-icons.upload class="h-4 w-4" />
                                            Seleccionar
                                        </label>                                           
                                        <input @change="upload($event)" type="file" id="home_logo" name="home_logo" accept="image/png" class="hidden">
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4">
                                        <div class="bg-gray-200 w-max">
                                            <img src="{{$webConfigs['footer_logo']}}" class="w-16 md:w-32 max-w-full max-h-full" alt="footer_logo">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        Footer logo
                                    </td>
                                    <td class="px-6 py-4">
                                        <label for="footer_logo" class="font-medium text-blue-600 dark:text-blue-500 hover:underline flex items-center gap-1 cursor-pointer">
                                            <x-icons.upload class="h-4 w-4" />
                                            Seleccionar
                                        </label>                                           
                                        <input @change="upload($event)" type="file" id="footer_logo" name="footer_logo" accept="image/png" class="hidden">
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4">
                                        <div class="bg-gray-200 w-max"><img src="{{$webConfigs['small_logo_light']}}" class="w-16 md:w-32 max-w-full max-h-full" alt="small_logo_light"></div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        Small logo light
                                    </td>
                                    <td class="px-6 py-4">
                                        <label for="small_logo_light" class="font-medium text-blue-600 dark:text-blue-500 hover:underline flex items-center gap-1 cursor-pointer">
                                            <x-icons.upload class="h-4 w-4" />
                                            Seleccionar
                                        </label>                                           
                                        <input @change="upload($event)" type="file" id="small_logo_light" name="small_logo_light" accept="image/png" class="hidden">
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="p-4">
                                        <img src="{{$webConfigs['small_logo_dark']}}" class="w-16 md:w-32 max-w-full max-h-full" alt="small_logo_dark">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        Small logo dark
                                    </td>
                                    <td class="px-6 py-4">
                                        <label for="small_logo_dark" class="font-medium text-blue-600 dark:text-blue-500 hover:underline flex items-center gap-1 cursor-pointer">
                                            <x-icons.upload class="h-4 w-4" />
                                            Seleccionar
                                        </label>                                           
                                        <input @change="upload($event)" type="file" id="small_logo_dark" name="small_logo_dark" accept="image/png" class="hidden">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>