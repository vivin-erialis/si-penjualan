<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriProduk;
use App\Models\Produk;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.produk.index', [
            'produk' => Produk::with('kategoriproduk')->get(),
            'kategoriproduk' => KategoriProduk::all(),
            'barang' => Barang::all()
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
   
    // Validasi data yang diterima dari formulir
    $request->validate([
        'kode_produk' => 'required',
        'nama_produk' => 'required',
        'kode_kategori' => 'required',
        'harga' => 'required',
        'deskripsi' => 'required',
        'status' => 'required',
    ]);

    // Buat instance baru dari model Produk
    $produk = new Produk;
    $produk->kode_produk = $request->kode_produk;
    $produk->nama_produk = $request->nama_produk;
    $produk->kode_kategori = $request->kode_kategori;
    $produk->harga = $request->harga;
    $produk->deskripsi = $request->deskripsi;
    $produk->status = $request->status;

    // Simpan data ke database
    $produk->save();

    // Redirect ke halaman atau tampilkan pesan sukses
    return redirect()->back()->with('pesan', 'Data produk berhasil disimpan.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Validasi input
        $validatedData = $request->validate([
            'kode_produk' => 'required',
            'kode_kategori' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        Produk::where('id', $id)->update($validatedData);
        return redirect('/admin/produk')->with('pesan', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Produk::destroy($id);
        return redirect('/admin/produk')->with('pesan', 'Data Berhasil Dihapus');
    }
    
}
