<x-application-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <table class="table table-border text-center align-middle">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga Barang</th>
                <th>Total Harga Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($charts as $chart)
                <tr>
                    <td>{{ $chart->kode_barang }}</td>
                    <td>{{ $chart->nama_barang }}</td>
                    <td>{{ $chart->qty }}</td>
                    <td>{{ $chart->harga_barang }}</td>
                    <td>{{ $chart->total_harga_barang }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</x-application-layout>
