<x-application-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chart') }}
        </h2>
    </x-slot>


    <div class="py-12 container mt-4">
        <a href="{{ route('charts.create') }}">
            <button type="button" class="btn btn-info border border-dark">Tambah Data</button>
        </a>

        <table class="table table-border text-center align-middle">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga Barang</th>
                    <th>Total Harga Barang</th>
                    <th>Aksi</th>
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
                        <td class="d-flex justify-content-center align-items-center gap-2">
                            <form action="{{ route('charts.edit', $chart->id) }}" method="get">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                            <form action="{{route('charts.destroy', $chart->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-application-layout>
