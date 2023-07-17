<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Barang::with('kategori')->get();
        return view('admin.dashboard.barang.index', [
            'barang' => Barang::with('kategoribarang')->get(),
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
                "inputs.*.kode" => 'required',
                "inputs.*.id_kategori" => 'required',
                "inputs.*.nama_barang" => 'required',
                "inputs.*.harga" => 'required',
                "inputs.*.stok" => 'required'

            ]
        );
        foreach ($request->inputs as $value) {
            Barang::create($value);
        }

        return redirect('/admin/barang')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barangs, $id)
    {
        //
        $validatedData = $request->validate([
            'kode' => 'required',
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ]);
        Barang::where('id', $id)->update($validatedData);
        return redirect('/barang')->with('pesan', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barangs, $id)
    {
        //
        Barang::destroy($id);
        return redirect('/barang')->with('pesan', 'Data Berhasil Dihapus');
    }
}
