<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.dashboard.transaksi.index', [
            'transaksi' => Transaksi::with('barang')->get(),
            'barang' => Barang::all()
        ]);

      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'kode_barang' => 'required',
        //     'jenis_transaksi' => 'required',
        //     'jumlah' => 'required',
            
        // ]);
        // Transaksi::create($validatedData);

        // return redirect('/admin/transaksi')->with('pesan', 'Data berhasil Ditambah');

       

        // Barang::where('kode_produk', '=', $request->kode_produk)->update(['status' => 'Terjual']);

        $data = $request->validate([
            'kode_transaksi' => 'required',
            'kode_barang' => 'required|exists:barangs,id',
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
        ]);


        $transaksi = Transaksi::create($data);


        // Update stok barang
        $barang = Barang::find($data['kode_barang']);
        if ($data['jenis_transaksi'] === 'masuk') {
            $barang->stok += $data['jumlah'];
        } else {
            $barang->stok -= $data['jumlah'];
        }
        $barang->save();

        return redirect('/admin/transaksi')->with('pesan', 'Data berhasil Ditambah');

        // return response()->json(['message' => 'Transaksi berhasil disimpan.']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function c(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Transaksi::destroy($id);
        return redirect('/admin/transaksi')->with('pesan', 'Data Berhasil Dihapus');
    }
}
