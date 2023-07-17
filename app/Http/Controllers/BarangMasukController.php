<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.barang masuk.index', [
            'barang_masuk' => BarangMasuk::all()
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
        return view('dashboard.barang masuk.create');
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
        {
            $barang = Barang::findOrFail($request->id);
            $barang->stok += $request->jumlah;
            $barang->save();
    
            BarangMasuk::create([
                'id' => $barang->id,
                'kode' =>$barang->kode,
                'nama_barang' =>$barang->namaBarang,
                'jumlah' => $request->jumlah,
                'harga' => $barang->harga,
                'keterangan' =>$barang->keterangan
            ]);
            return response()->json([
                'success' => true,
            ]);
            // return redirect('/barangMasuk')->with('pesan', 'Data Berhasil Ditambahkan');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangMasuk $barangMasuks, $id)
    {
        //
        return view('dashboard.barang masuk.edit', [
            'barang_masuk' => BarangMasuk::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangMasuk $barangMasuks, $id)
    {
        //
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'keterangan' => 'required'
        ]);
        BarangMasuk::where('id', $id)->update($validatedData);
        return redirect('/barangMasuk')->with('pesan', 'Data Berhasil Diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangMasuk $barangMasuks, $id)
    {
        //
        BarangMasuk::destroy($id);
        return redirect('/barangMasuk')->with('pesan', 'Data Berhasil Dihapus');
    }
}

