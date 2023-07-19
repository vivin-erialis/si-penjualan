<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.kategoriBarang.index', [
            'kategoribarang' => KategoriBarang::all()
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
                "inputs.*.kode_kategori" => 'required',
                "inputs.*.nama_kategori" => 'required',
            ]
        );
        foreach ($request->inputs as $value) {
            KategoriBarang::create($value);
        }

        if (count($request->inputs) > 0) {
            return redirect('/admin/kategoribarang')->with('pesan', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('/admin/kategoribarang')->with('pesan', 'Tidak ada data yang ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBarang $kategoriBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriBarang $kategoriBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, KategoriBarang $kategoriBarang)
    {
        //
        $validatedData = $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required'
        ]);
        KategoriBarang::where('id', $id)->update($validatedData);
        return redirect('/admin/kategoribarang')->with('pesan', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriBarang $kategoriBarang, $id)
    {
        //
        KategoriBarang::destroy($id);
        return redirect('/admin/kategoribarang')->with('pesan', 'Data Berhasil Dihapus');
    }
}
