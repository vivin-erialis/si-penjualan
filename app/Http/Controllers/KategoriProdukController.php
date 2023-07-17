<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.kategoriProduk.index', [
            'kategoriproduk' => KategoriProduk::all()
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
        $request->validate(
            [
                "inputs.*.nama_kategori" => 'required',
            ]
        );
        foreach ($request->inputs as $value) {
            KategoriProduk::create($value);
        }

        if (count($request->inputs) > 0) {
            return redirect('/admin/kategoriproduk')->with('pesan', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('/admin/kategoriproduk')->with('pesan', 'Tidak ada data yang ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, KategoriProduk $kategoriProduk)
    {
        //
        $validatedData = $request->validate([
            'nama_kategori' => 'required'
        ]);
        KategoriProduk::where('id', $id)->update($validatedData);
        return redirect('/admin/kategoriproduk')->with('pesan', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,KategoriProduk $kategoriProduk)
    {
        //
        KategoriProduk::destroy($id);
        return redirect('/admin/kategoriproduk')->with('pesan', 'Data Berhasil Dihapus');
    }
}
