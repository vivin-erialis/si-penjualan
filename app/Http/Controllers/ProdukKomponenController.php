<?php

namespace App\Http\Controllers;

use App\Models\produk_komponen;
use Illuminate\Http\Request;

class ProdukKomponenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $jumlahKomponen = $request->input('jumlah_komponen');
        $komponenHarga = $request->input('komponen_harga');

        foreach ($jumlahKomponen as $komponenId => $jumlah) {
            // Simpan komponen ke dalam tabel komponen
            $komponen = new produk_komponen();
            $komponen->jumlah = $jumlah;
            $komponen->harga = $komponenHarga[$komponenId];
            $komponen->save();
        }

        return redirect()->back()->with('success', 'Komponen berhasil disimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk_komponen  $produk_komponen
     * @return \Illuminate\Http\Response
     */
    public function show(produk_komponen $produk_komponen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk_komponen  $produk_komponen
     * @return \Illuminate\Http\Response
     */
    public function edit(produk_komponen $produk_komponen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk_komponen  $produk_komponen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk_komponen $produk_komponen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk_komponen  $produk_komponen
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk_komponen $produk_komponen)
    {
        //
    }
}
