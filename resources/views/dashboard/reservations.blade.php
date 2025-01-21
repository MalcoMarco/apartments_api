<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-right mb-4">
                        <button type="button" class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Nuevo Apartment</button>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg min-h-[300px]">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-100 uppercase bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            LEVEL #
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            APARTMENT ID
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            PRICE/m2
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            TOTAL AMOUNT
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            ¿AVAILABILITY?
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
                                            <x-button @click="deleteApartment(item.apartment_id)" variant="danger">
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
    </div>
</x-app-layout>