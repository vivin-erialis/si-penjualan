<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PetugasPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bulan = $request->input('bulan');

        if ($bulan) {
            $penjualan = Penjualan::with('produk')
                ->whereYear('created_at', Carbon::parse($bulan)->year)
                ->whereMonth('created_at', Carbon::parse($bulan)->month)
                ->get();

            if ($penjualan->isEmpty()) {
                return back()->with('pesan', 'Data Tidak Tersedia');
            }
        } else {
            $penjualan = Penjualan::with('produk')
                ->get();
        }

        return view('petugas.dashboard.penjualan.index', [
            'penjualan' => $penjualan,
            'produk' => Produk::all()
        ]);
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
            'nama_produk' => 'required',
            'kode_kategori' => 'required',
            'tanggal_transaksi' => 'required',
            'harga' => 'required',
        ]);
        Penjualan::create($validatedData);

        Produk::where('id', '=', $request->nama_produk)->update(['status' => 'Terjual']);

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
