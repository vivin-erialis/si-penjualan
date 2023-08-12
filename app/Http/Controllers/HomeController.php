<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Carbon\Carbon;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $data=Penjualan::join('kategori_produks','penjualans.kode_kategori','=','kategori_produks.id')
        ->select(\DB::raw("COUNT(*) as count"), DB::raw('kategori_produks.nama_kategori as kode'))
        ->whereMonth('penjualans.tanggal_transaksi', $bulanIni)
        ->whereYear('penjualans.tanggal_transaksi', $tahunIni)
            ->groupBy(\DB::raw("kode"))
            ->orderBy('penjualans.tanggal_transaksi', 'asc')
            ->pluck('count', 'kode');



        $labelGrafik = $data->keys();
        $dataGrafik = $data->values();

        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ][$bulanIni];

        $totalTerjual = $this->getTotalTerjual();
        $totalPendapatan = $this->getTotalPendapatan();
        $totalPengeluaran = $this->getTotalPengeluaran();
        return view('admin.dashboard.home.dashboard', compact('totalTerjual', 'totalPendapatan', 'totalPengeluaran', 'labelGrafik', 'dataGrafik', 'tahunIni', 'namaBulan'));
    }

    // ... kode lain dalam controller ...

    public function getTotalTerjual()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalTerjual = Penjualan::whereMonth('tanggal_transaksi', $bulanIni)
            ->whereYear('tanggal_transaksi', $tahunIni)
            ->count();

        return $totalTerjual;
    }

    public function getTotalPendapatan()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalPendapatan = Penjualan::whereMonth('tanggal_transaksi', $bulanIni)
            ->whereYear('tanggal_transaksi', $tahunIni)
            ->sum('harga');

        return $totalPendapatan;
    }

    public function getTotalPengeluaran()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalPengeluaran = Transaksi::whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->where('jenis_transaksi', '=', 'masuk')
            ->sum('harga');

        return $totalPengeluaran;
    }

    public function indexPetugas()
    {
        return view('petugas.dashboard.home.dashboard');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
