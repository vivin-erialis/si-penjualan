<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;

class CetakLaporanController extends Controller
{
    public function cetaklaporanpenjualan()
    {
        $laporanPenjualan = Penjualan::select('*')
            ->get();

        $pdf = PDF::loadView('admin.dashboard.penjualan.laporan', ['penjualan' => $laporanPenjualan]);
        return $pdf->stream('Laporan-Penjualan.pdf');
    }

    public function cetakpembelian()
    {
        $jenisTransaksi = 'masuk'; // Ganti dengan jenis transaksi yang Anda inginkan

        $transaksi = Transaksi::where('jenis_transaksi', $jenisTransaksi)
                    ->get();

        $pdf = PDF::loadView('admin.dashboard.pembelian.laporan', ['transaksi' => $transaksi]);
        return $pdf->stream('Laporan-Data-Santri.pdf');
    }
}
