<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;

class PendapatanController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($startDate && $endDate) {
            $penjualan = Penjualan::with('produk')

                ->whereBetween('tanggal_transaksi', [$startDate, $endDate])
                ->get();

            if ($penjualan->isEmpty()) {
                return back()->with('pesan', 'Data Tidak Tersedia');
            }
        } else {
            $penjualan = Penjualan::with('produk')
                ->get();
        }

        return view('admin.dashboard.penjualan.index', [
            'penjualan' => $penjualan,
            'produk' => Produk::all()
        ]);
    }
}
