<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class PetugasTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('petugas.dashboard.transaksi.index', [
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

        // return redirect('/petugas/transaksi')->with('pesan', 'Data berhasil Ditambah');



        // Barang::where('kode_produk', '=', $request->kode_produk)->update(['status' => 'Terjual']);

        $data = $request->validate([
            'kode_transaksi' => 'required',
            'kode_barang' => 'required|exists:barangs,id',
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'satuan' => 'required',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required',
            'total' => 'required',
        ]);

        // Update stok barang
        $barang = Barang::find($data['kode_barang']);
        if ($data['jenis_transaksi'] === 'masuk') {
            $barang->stok += $data['jumlah'];
            $barang->harga += $data['harga'];
        } else {
            $barang->stok -= $data['jumlah'];
            // if ($barang->stok < 0) {
            //     // Stok tidak mencukupi untuk transaksi keluar
            //     // Anda bisa menangani kasus ini sesuai dengan kebutuhan Anda
            //     return redirect('/petugas/transaksi')->with('pesan', 'Stok barang tidak mencukupi');
            // }

        }
        $barang->save();
        $transaksi = Transaksi::create($data);

        return redirect('/petugas/transaksi')->with('pesan', 'Data berhasil Ditambah');

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
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate([
            'kode_transaksi' => 'required',
            'kode_barang' => 'required|exists:barangs,id',
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'satuan' => 'required',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required',
            'total' => 'required',
        ]);


        // Update stok barang
        $barang = Barang::find($data['kode_barang']);
        if ($data['jenis_transaksi'] === 'masuk') {
            $stokSetelahDitambah = $barang->stok + $data['jumlah'];
            $barang->stok = $stokSetelahDitambah - $barang->stok;
        } else {
            // Jika jenis transaksi bukan 'masuk', kurangi jumlah baru dari stok barang
            $stokSetelahDikurang = $barang->stok - $data['jumlah'];

            // Periksa apakah stok cukup untuk transaksi keluar
            if ($stokSetelahDikurang < 0) {
                // Stok tidak mencukupi untuk transaksi keluar
                // Anda bisa menangani kasus ini sesuai dengan kebutuhan Anda
                return redirect('/petugas/transaksi')->with('pesan', 'Stok barang tidak mencukupi');
            }

            $barang->stok = $stokSetelahDikurang;
        }

        // Simpan perubahan stok barang
        $barang->save();

        // Update data transaksi
        Transaksi::where('id', $id)->update($data);
        return redirect('/petugas/transaksi')->with('pesan', 'Data Transaksi Berhasil Diubah');



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
        return redirect('/petugas/transaksi')->with('pesan', 'Data Transaksi Berhasil Dihapus');
    }
}
