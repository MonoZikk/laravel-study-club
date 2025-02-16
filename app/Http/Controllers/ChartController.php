<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charts = Chart::all();
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
        Chart::create([
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'qty'=>$request->qty,
            'harga_barang'=>$request->harga_barang,
            'total_harga_barang'=>$request->qty* $request->harga_barang
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
        $chart = Chart::find($id);
        return view('charts.edit', ['chart'=>$chart]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Chart::find($id)->update([
            'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'qty'=>$request->qty,
            'harga_barang'=>$request->harga_barang,
            'total_harga_barang'=>$request->qty* $request->harga_barang
        ]);

        return redirect()->route('charts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Chart::find($id)->delete();
        return redirect()->route('charts.index');
    }
}
