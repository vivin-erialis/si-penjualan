<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use PDF;


class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.sewa.index', [
            'sewa' => Sewa::with('kategoriproduk')->get(),
            'kategoriproduk' => KategoriProduk::all()
        ]);
    }

    public function indexPetugas()
    {
        //
        return view('petugas.dashboard.sewa.index', [
            'sewa' => Sewa::with('kategoriproduk')->get(),
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
        // $validatedData = $request->validate([
        //     // 'kode_sewa' => 'required',
        //     'nama_penyewa' => 'required',
        //     'telp' => 'required',
        //     'alamat' => 'required',
        //     'tanggal_sewa' => 'required',
        //     'nama_produk' => 'required',
        //     'harga_sewa' => 'required',
        //     'deskripsi' => 'required',

        // ]);
        // Sewa::create($validatedData);

        // Redirect ke halaman atau tampilan lain jika diperlukan
        // return redirect('/admin/sewa')->with('pesan', 'Data Sewa berhasil disimpan.');

    try {
        $validatedData = $request->validate([
            'nama_penyewa' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'tanggal_sewa' => 'required',
            'nama_produk' => 'required',
            'harga_sewa' => 'required',
            'deskripsi' => 'required',
        ]);

        Sewa::create($validatedData);

        return redirect('/admin/sewa')->with('pesan', 'Data Sewa berhasil disimpan.');
    } catch (\Exception $e) {
        // Ambil pesan error dari exception
        $errorMessage = $e->getMessage();

        // Tampilkan pesan error kepada pengguna atau lakukan handling lainnya
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $errorMessage);
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function show(Sewa $sewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Sewa $sewa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            // 'kode_sewa' => 'required',
            'nama_penyewa' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'tanggal_sewa' => 'required',
            'nama_produk' => 'required',
            'harga_sewa' => 'required',
            'deskripsi' => 'required',

        ]);
        Sewa::where('id', $request->id)->update($validatedData);

        // Redirect ke halaman atau tampilan lain jika diperlukan
        return redirect('/admin/sewa')->with('pesan', 'Data Sewa Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Sewa::destroy($id);
        return redirect('/admin/sewa')->with('pesan', 'Data Sewa Berhasil Dihapus');
    }
}
