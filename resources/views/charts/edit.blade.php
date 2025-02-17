<x-application-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Charts') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <h1>Edit Data</h1>
        <form action="{{ route('charts.update', $chart->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                    value="{{ old('kode_barang', $chart->kode_barang) }}">
                @error('kode_barang')
                    <div class="text-danger fst-italic">Kode barang harus diisi!</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                    value="{{ old('nama_barang', $chart->nama_barang) }}">
                @error('nama_barang')
                    <div class="text-danger fst-italic">Nama barang harus diisi!</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">QTY</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty', $chart->qty) }}">
                @error('qty')
                    <div class="text-danger fst-italic">Jumlah barang harus diisi!</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                    value="{{ old('harga_barang', $chart->harga_barang) }}">
                @error('harga_barang')
                    <div class="text-danger fst-italic">Harga barang harus diisi!</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-application-layout>
