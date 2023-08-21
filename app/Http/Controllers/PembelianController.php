<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use App\Models\Barang;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    //
    public function index(Request $request)
    {
        $bulan = $request->input('bulan');


        if ($bulan) {
            $pembelian = Transaksi::with('barang')
                ->whereYear('created_at', Carbon::parse($bulan)->year)
                ->whereMonth('created_at', Carbon::parse($bulan)->month)
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
