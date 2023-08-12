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
        try {
            $data = $request->validate([
                "inputs.*.kode_barang" => 'required',
                "inputs.*.jenis_transaksi" => 'required|in:masuk,keluar',
                "inputs.*.jumlah" => 'required|integer|min:1',
                "inputs.*.harga" => 'required',
                "inputs.*.harga_pcs" => 'required',
            ]);

            // Loop through each input item in the multiinput
            foreach ($data['inputs'] as $input) {
                // Update stok barang for each item
                $barang = Barang::find($input['kode_barang']);
                if ($input['jenis_transaksi'] === 'masuk') {
                    $barang->stok += $input['jumlah'];
                    $barang->harga += $input['harga_pcs'];
                } else {
                    $barang->stok -= $input['jumlah'];
                    if ($barang->stok < 0) {
                        return redirect('/admin/transaksi')->with('pesan', 'Stok barang tidak mencukupi');
                    }
                }
                $barang->save();
                Transaksi::create($input);
            }

            return redirect('/admin/transaksi')->with('pesan', 'Data berhasil Ditambah');
        } catch (\Exception $e) {
            return redirect('/admin/transaksi')->with('pesan', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
            'kode_barang' => 'required|exists:barangs,id',
            'jenis_transaksi' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required',
            'harga_pcs' => 'required',
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
                return redirect('/admin/transaksi')->with('pesan', 'Stok barang tidak mencukupi');
            }

            $barang->stok = $stokSetelahDikurang;
        }

        // Simpan perubahan stok barang
        $barang->save();

        // Update data transaksi
        Transaksi::where('id', $id)->update($data);
        return redirect('/admin/transaksi')->with('pesan', 'Data Transaksi Berhasil Diubah');



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
        return redirect('/admin/transaksi')->with('pesan', 'Data Transaksi Berhasil Dihapus');
    }
}
