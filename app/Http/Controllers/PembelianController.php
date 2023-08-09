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

        if($startDate && $endDate){
            $pembelian = Transaksi::with('barang')->whereBetween('created_at',[$startDate, $endDate])->get();
        }else{
            $pembelian =Transaksi::with('barang')->get();
        }

        return view('admin.dashboard.pembelian.index', [
            'transaksi' => Transaksi::with('barang')->where('jenis_transaksi' ,'=', 'masuk')->get(),
            'barang' => Barang::all()
        ]);
    }
}
