<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-wrap">
                        <div class="relative overflow-x-auto">
                            <table class="w-full md:w-96 text-sm text-left text-gray-500 ">
                                <thead class="text-xs text-gray-50 uppercase bg-gray-500">
                                    <tr class="text-center">
                                        @foreach ($dataHeader as $header)
                                            <th class="px-6 py-3">{{ $header['value'] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataBody as $rows)
                                        <tr class="text-center border-b">
                                            @foreach ($rows as $row)
                                                <td class="px-3 py-1 font-medium text-gray-900">{{ $row['value'] }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr class="text-center">
                                        <td class="font-medium text-gray-900">Total Resultado</td>
                                        @foreach ($totals as $total)
                                            <td class="font-medium text-gray-500">{{ $total }} </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-gray-900 flex justify-center flex-1">
                            <div class="relative overflow-x-auto">
                                <div style="width: 600px; position: relative; overflow: auto"><canvas id="G1"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <x-slot name="head">
        @php
            
        @endphp
        <script>
            window.CHART_COLORS = {
                red: 'rgb(255, 99, 132)',
                orange: 'rgb(255, 159, 64)',
                yellow: 'rgb(255, 205, 86)',
                green: 'rgb(75, 192, 192)',
                blue: 'rgb(54, 162, 235)',
                purple: 'rgb(153, 102, 255)',
                grey: 'rgb(201, 203, 207)'
            };
            const labels = ["1", "2", "3", "4", "5"];
            const data = {
                labels: labels,
                datasets: [
                    {
                        label: 'Available',
                        data: @json($datasets['Available']),
                        backgroundColor: CHART_COLORS.green,
                    },
                    {
                        label: 'Blocked',
                        data: @json($datasets['Blocked']),
                        backgroundColor: CHART_COLORS.yellow,
                    },
                    {
                        label: 'Other',
                        data: @json($datasets['Other']),
                        backgroundColor: CHART_COLORS.blue,
                    },
                    {
                        label: 'Reserved',
                        data: @json($datasets['Reserved']),
                        backgroundColor: CHART_COLORS.red,
                    },
                ]
            };
            const config = {
                type: 'bar',
                data: data,
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'LEVEL# / AVAILABILITY'
                        },
                    },
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            };
            window.G1 = config

        </script>
        @vite(['resources/js/dashboard/index.js'])
    </x-slot>
</x-app-layout>
