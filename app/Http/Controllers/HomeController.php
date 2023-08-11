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
        $data=Produk::join('kategori_produks','produks.kode_kategori','=','kategori_produks.id')
        ->select(\DB::raw("COUNT(*) as count"), DB::raw('kategori_produks.nama_kategori as kode'))
        ->whereYear('produks.created_at', date('Y'))
            ->groupBy(\DB::raw("kode"))
            ->orderBy('produks.created_at', 'asc')
            ->pluck('count', 'kode');

        $labelGrafik=$data->keys();
        $dataGrafik=$data->values();


        $totalTerjual = $this->getTotalTerjual();
        $totalPendapatan = $this->getTotalPendapatan();
        $totalPengeluaran = $this->getTotalPengeluaran();
        return view('admin.dashboard.home.dashboard', compact('totalTerjual', 'totalPendapatan', 'totalPengeluaran','labelGrafik','dataGrafik'));
    }

    // ... kode lain dalam controller ...

    public function getTotalTerjual()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalTerjual = Penjualan::whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->count();

        return $totalTerjual;
    }

    public function getTotalPendapatan()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $totalPendapatan = Penjualan::whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
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
