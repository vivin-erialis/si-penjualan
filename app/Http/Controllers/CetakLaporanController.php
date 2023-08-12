<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Sewa;
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
                $totalPenjualan = Penjualan::whereBetween('tanggal_transaksi', [$startDate, $endDate])
                ->sum('harga');
        } else {
            $penjualan = Penjualan::with('produk')
                ->get();
                $totalPenjualan = Penjualan::sum('harga');
        }

        $pdf = PDF::loadView('admin.dashboard.penjualan.laporan-penjualan', compact('penjualan','totalPenjualan'));
        return $pdf->stream('Laporan-Penjualan.pdf');
    }

    // private function formatPenjualan($penjualan)
    // {
    //     $formattedPenjualan = [];
    //     $currentMonth = null;

    //     foreach ($penjualan as $index => $data) {
    //         $tanggal = Carbon::createFromFormat('Y-m-d', $data->tanggal_transaksi);
    //         $bulan = $tanggal->format('F Y');

    //         if ($bulan !== $currentMonth) {
    //             $formattedPenjualan[] = [
    //                 'isHeader' => true,
    //                 'headerText' => $bulan,
    //             ];
    //             $currentMonth = $bulan;
    //         }

    //         $formattedPenjualan[] = [
    //             'isHeader' => false,
    //             'index' => $index + 1,
    //             'tanggal' => $tanggal->format('d/m/Y'),
    //             'produk' => $data->produk->nama_produk,
    //             'harga' => $data->harga,
    //         ];
    //     }

    //     return $formattedPenjualan;
    // }
    public function cetaklaporanpembelian()
    {
        $jenisTransaksi = 'masuk'; // Ganti dengan jenis transaksi yang Anda inginkan

        $transaksi = Transaksi::where('jenis_transaksi', $jenisTransaksi)
            ->get();


        $pdf = PDF::loadView('admin.dashboard.pembelian.laporan', ['transaksi' => $transaksi]);
        return $pdf->stream('Laporan-Pembelian-Barang.pdf');
    }

    public function cetaklaporanpendapatan(Request $request)
    {

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
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

        $namaBulanStart = [
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
        ][Carbon::createFromFormat('Y-m-d', $startDate)->format('n')];

        $namaBulan = $namaBulanStart;


        $transaksiKeluar = Transaksi::where('jenis_transaksi', '=', 'keluar')
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();


        $hargaModalBarang = 0;

        foreach ($transaksiKeluar as $transaksi) {
            $hargaModalBarang += $transaksi->jumlah * $transaksi->harga_pcs;
        }


        $hargaModalProduk = Produk::where('status', '=', 'Terjual')
        ->whereDate('created_at', '>=', $startDate)
        ->whereDate('created_at', '<=', $endDate)
            ->sum('harga_modal');
        $totalSewa = Sewa::sum('harga_sewa');

        $totalPenjualan = Penjualan::whereBetween('tanggal_transaksi', [$startDate, $endDate])
            ->sum('harga');
        $hargaModal = $hargaModalBarang + $hargaModalProduk;


        $pdf = PDF::loadView('admin.dashboard.penjualan.laporan-pendapatan', compact('hargaModalProduk', 'totalPenjualan', 'totalSewa', 'hargaModalBarang', 'hargaModal','namaBulan','tahunIni'));
        return $pdf->stream('Laporan-Pendapatan.pdf');
    }

//     public function cetaklaporanpendapatan(Request $request)
// {
//     $startDate = $request->input('start_date');
//     $endDate = $request->input('end_date');

//     $namaBulan = [
//         1 => 'Januari',
//         2 => 'Februari',
//         // ... (daftar nama bulan lainnya)
//     ];

//     $transaksiKeluar = Transaksi::where('jenis_transaksi', '=', 'keluar');

//     if ($startDate && $endDate) {
//         $transaksiKeluar = $transaksiKeluar
//             ->whereDate('created_at', '>=', $startDate)
//             ->whereDate('created_at', '<=', $endDate);
//     }

//     $transaksiKeluar = $transaksiKeluar->get();

//     $hargaModalBarang = 0;

//     foreach ($transaksiKeluar as $transaksi) {
//         $hargaModalBarang += $transaksi->jumlah * $transaksi->harga_pcs;
//     }

//     $hargaModalProdukQuery = Produk::where('status', '=', 'Terjual');
//     $totalSewa = Sewa::sum('harga_sewa');

//     if ($startDate && $endDate) {
//         $hargaModalProdukQuery = $hargaModalProdukQuery
//             ->whereDate('created_at', '>=', $startDate)
//             ->whereDate('created_at', '<=', $endDate);
//     }

//     $hargaModalProduk = $hargaModalProdukQuery->sum('harga_modal');

//     $totalPenjualanQuery = Penjualan::query();

//     if ($startDate && $endDate) {
//         $totalPenjualanQuery = $totalPenjualanQuery
//             ->whereBetween('tanggal_transaksi', [$startDate, $endDate]);
//     }
//     $hargaModalProduk = Produk::where('status', '=', 'Terjual')

//             ->sum('harga_modal');
//         $totalSewa = Sewa::sum('harga_sewa');

//         $totalPenjualan = Penjualan::whereBetween('tanggal_transaksi', [$startDate, $endDate])
//             ->sum('harga');
//         $hargaModal = $hargaModalBarang + $hargaModalProduk;
//     $totalPenjualan = $totalPenjualanQuery->sum('harga');

//     $pdf = PDF::loadView('admin.dashboard.penjualan.laporan-pendapatan', compact('hargaModalProduk', 'totalPenjualan', 'totalSewa', 'hargaModalBarang','hargaModal'));

//     return $pdf->stream('Laporan-Pendapatan.pdf');
// }

}
