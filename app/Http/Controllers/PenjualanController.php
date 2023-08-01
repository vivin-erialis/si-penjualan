<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.penjualan.index', [
            'penjualan' => Penjualan::with('produk')->get(),
            'produk' => Produk::all()
        ]);
    }

    
    public function getDataByDateRange(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $dataPenjualan = Penjualan::whereBetween('tanggal_transaksi', [$startDate, $endDate])->get();
    
        return response()->json($dataPenjualan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'kode_penjualan' => 'required',
            'nama_produk' => 'required',
            'kode_kategori' => 'required',
            'tanggal_transaksi' => 'required',
            'harga' => 'required',
        ]);
        Penjualan::create($validatedData);

        Produk::where('nama_produk', '=', $request->nama_produk)->update(['status' => 'Terjual']);

        // Redirect ke halaman atau tampilan lain jika diperlukan
        return redirect()->back()->with('berhasil', 'Data penjualan berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
