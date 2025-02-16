<x-application-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Charts') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>Edit Data</h1>
        <form action="{{route('charts.update', $chart->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{$chart->kode_barang}}">
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$chart->nama_barang}}">
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">QTY</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{$chart->qty}}">
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="{{$chart->harga_barang}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-application-layout>
