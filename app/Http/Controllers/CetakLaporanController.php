<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;

class CetakLaporanController extends Controller
{
    public function cetaklaporanpenjualan(Request $request)
    {

        // $laporanPenjualan = Penjualan::select('*')
        //     ->get();

        // $pdf = PDF::loadView('admin.dashboard.penjualan.laporan', ['penjualan' => $laporanPenjualan]);
        // return $pdf->stream('Laporan-Penjualan.pdf');
        // $tanggalAwal = $request->input('start_date');
        // $tanggalAkhir = $request->input('end_date');

        // if (!empty($tanggalAwal)) {
        //     $tanggalAwal = date('Y-m-d', strtotime($tanggalAwal));
        // }

        // if (!empty($tanggalAkhir)) {
        //     $tanggalAkhir = date('Y-m-d', strtotime($tanggalAkhir));
        // }

        // $laporanPenjualan = Penjualan::query();

        // if (!empty($tanggalAwal) && !empty($tanggalAkhir)) {
        //     $laporanPenjualan->whereBetween('tanggal_transaksi', [$tanggalAwal, $tanggalAkhir]);
        // }

        // $laporanPenjualan = $laporanPenjualan->get();

        // if ($laporanPenjualan->isEmpty()) {
        //     return back()->with('error', 'Tidak ada data penjualan dalam rentang tanggal yang dipilih.');
        // }
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($startDate && $endDate) {
            $penjualan = Penjualan::with('produk')
                ->whereBetween('tanggal_transaksi', [$startDate, $endDate])
                ->get();
        } else {
            $penjualan = Penjualan::with('produk')
            ->get();
        }

        $pdf = PDF::loadView('admin.dashboard.penjualan.laporan', ['penjualan' => $penjualan]);
        return $pdf->stream('Laporan-Penjualan.pdf');
    }

    public function cetaklaporanpembelian()
    {
        $jenisTransaksi = 'masuk'; // Ganti dengan jenis transaksi yang Anda inginkan

        $transaksi = Transaksi::where('jenis_transaksi', $jenisTransaksi)
            ->get();

        $pdf = PDF::loadView('admin.dashboard.pembelian.laporan', ['transaksi' => $transaksi]);
        return $pdf->stream('Laporan-Pembelian-Barang.pdf');
    }
}
