<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
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
}
