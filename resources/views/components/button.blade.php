@props(['variant'])

@php
    $variant = [
        'default' => 'text-white dark:text-gray-800 bg-gray-800 dark:bg-gray-200 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300',
        'primary' => 'text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800',
        'success' => 'bg-emerald-700',
        'warning' => 'bg-amber-500 text-white',
        'danger' => 'bg-rose-700 text-white focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900',
        ][$variant ?? 'default'];
        @endphp


<button role="button" {{ $attributes->merge([
'class' => "$variant inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs tracking-widest focus:outline-none  transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</button>
