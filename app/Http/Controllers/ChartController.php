<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charts = collect();
        if(auth()->user()->role == 'admin'){
            $charts = Chart::all();    
        } else {
            $charts = Chart::where('user_id', auth()->id())->get();
        }
        return view('charts.index', ['charts' => $charts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("charts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|integer|min:1',
            'nama_barang' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'harga_barang' => 'required|numeric|min:0',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $fotoPath = null;
        if ($request->hasFile('foto_barang')) {
            $fotoPath = $request->file('foto_barang')->store('uploads', 'public');
        }
        

        Chart::create([
            'kode_barang' => $request->kode_barang,
            'user_id' => auth()->id(),
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'harga_barang' => $request->harga_barang,
            'total_harga_barang' => $request->qty * $request->harga_barang,
            'foto_barang' => $fotoPath,
        ]);

        return redirect()->route('charts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $uservalidation = Chart::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$uservalidation) {
            return abort(403, 'Anda tidak memiliki izin untuk mengedit barang ini.');
        }

        $chart = Chart::find($id);
        return view('charts.edit', ['chart' => $chart]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $uservalidation = Chart::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$uservalidation) {
            return abort(403, 'Anda tidak memiliki izin untuk mengedit barang ini.');
        }

        $request->validate([
            'kode_barang' => 'required|integer|min:1',
            'nama_barang' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'harga_barang' => 'required|numeric|min:0',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_barang')) {
            $fotoPath = $request->file('foto_barang')->store('uploads', 'public');
        }

        Chart::find($id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'harga_barang' => $request->harga_barang,
            'total_harga_barang' => $request->qty * $request->harga_barang,
            'foto_barang' => $fotoPath,
        ]);

        return redirect()->route('charts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $uservalidation = Chart::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$uservalidation) {
            return abort(403, 'Anda tidak memiliki izin untuk menghapus barang ini.');
        }

        Chart::find($id)->delete();
        return redirect()->route('charts.index');
    }
}
