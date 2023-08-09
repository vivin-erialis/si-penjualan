<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\produk_komponen;
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
        return view('admin.dashboard.produk.create', [
            'produk' => Produk::with('kategoriproduk')->get(),
            'kategoriproduk' => KategoriProduk::all(),
            'barang' => Barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hitungModal(Request $request)
    {
        $selectedKomponen = $request->input('komponen');

        $komponenData = Barang::whereIn('id', $selectedKomponen)->get();
        $totalModal = $komponenData->sum('harga');

        return view('hasil', ['totalModal' => $totalModal]);
    }
    public function store(Request $request)
    {
        // try {
        // Validasi data yang diterima dari formulir
        $validate = $request->validate([
            'nama_produk' => 'required',
            'kode_kategori' => 'required',
            'harga_modal' => 'required',
            'harga_jual' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|',
            'status' => 'required',
        ]);




        if ($request->hasFile('foto')) {

            //jika request memiliki file dengan name foto maka -->
            $nama = time() . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images/foto_produk'), $nama);
            //Memindahkan file ke public/foto_pegawai dengan nama asli file
            $validate['foto'] = $nama;
            //Mengubah nama file menjadi nama asli sesuai nama file di direktori
        }

        // Buat instance baru dari model Produk
        $produk = new Produk;
        // $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->kode_kategori = $request->kode_kategori;
        $produk->harga_modal = $request->harga_modal;
        $produk->harga_jual = $request->harga_jual;
        $produk->komponen = $request->jumlah_komponen;
        $produk->deskripsi = $request->deskripsi;
        $produk->foto = $nama;
        $produk->status = $request->status;

        // Simpan data ke database
        $produk->save();

        $komponenIds = $request->input('komponenId'); // Array of komponen IDs
        $jumlahKomponen = $request->input('jumlah_komponen'); // Array of jumlah komponen

        foreach ($komponenIds as $komponenId) {
            $komponen = Barang::find($komponenId);

            if ($komponen) {
                $DataStok = $komponen->stok;
                $requestedJumlah = $jumlahKomponen[$komponenId];
                $hasil = $DataStok - $requestedJumlah;

                // Pastikan hasil tidak kurang dari 0
                if ($hasil >= 0) {
                    $komponen->update([
                        'stok' => $hasil
                    ]);
                } else {
                    // Handle kasus jika stok menjadi negatif
                    // Misalnya dengan memberikan pesan kesalahan kepada pengguna
                }
            }
        }

        // Produk::create($validate);
        // Redirect ke halaman atau tampilkan pesan sukses
        // return redirect()->back()->with('pesan', 'Data produk berhasil disimpan.');
        $jumlahKomponen = $request->input('jumlah_komponen');
        $komponenIds = $request->input('komponen');
        $hargaKomponen = $request->input('komponen_harga'); // Asumsi Anda menambahkan input hidden untuk harga komponen

        // foreach ($komponenIds as $index => $komponenId) {
        //     $komponen = new produk_komponen();
        //     $komponen->produk_id = $produk->id;
        //     $komponen->barang_id = $komponenId;
        //     $komponen->jumlah_digunakan = $jumlahKomponen[$index];
        //     $komponen->save();

        //     // Kurangi stok komponen pada tabel barang
        //     $barang = Barang::find($komponenId);
        //     $barang->stok -= $jumlahKomponen[$index];
        //     $barang->save();
        // }
        // dd($produk);

        $id_produk = Produk::latest()->first();


        produk_komponen::create([
            'produk_id' => $id_produk->id,
            'barang_id' => $request->komponenId,
            'jumlah' => $request->jumlah_komponen,
        ]);

        return redirect('/admin/produk');
        // Kode penyimpanan data di sini
        // } catch (\Exception $e) {
        //     // Tangkap pesan error
        //     dd($e->getMessage()); // Tampilkan pesan error
        // }


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
            'nama_produk' => 'required',
            'kode_kategori' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|',
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
