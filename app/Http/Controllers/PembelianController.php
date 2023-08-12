<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    //
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($startDate && $endDate) {
            $pembelian = Transaksi::with('barang')
                ->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate)
                ->get();
                if ($pembelian->isEmpty()) {
                    return back()->with('pesan', 'Data Tidak Tersedia');
                }
        } else {
            $pembelian = Transaksi::with('barang')->get();
        }

        return view('admin.dashboard.pembelian.index', [
            'transaksi' => $pembelian,
            'barang' => Barang::all()
        ]);
    }
}
