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

        $bulan = $request->input('bulan');


        if ($bulan) {
            $penjualan = Penjualan::with('produk')
                ->whereYear('tanggal_transaksi', Carbon::parse($bulan)->year)
                ->whereMonth('tanggal_transaksi', Carbon::parse($bulan)->month)
                ->get();
            $totalPenjualan = Penjualan::whereYear('tanggal_transaksi', Carbon::parse($bulan)->year)
                ->whereMonth('tanggal_transaksi', Carbon::parse($bulan)->month)
                ->sum('harga');
        } else {
            $penjualan = Penjualan::with('produk')
                ->get();
            $totalPenjualan = Penjualan::sum('harga');
        }

        $pdf = PDF::loadView('admin.dashboard.penjualan.laporan-penjualan', compact('penjualan', 'totalPenjualan'));
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
    public function cetaklaporanpembelian(Request $request)
    {
        $jenisTransaksi = 'masuk';

        $dataTransaksi = Transaksi::where('jenis_transaksi', $jenisTransaksi);

        if ($request->has('bulan')) {
            $bulan = $request->input('bulan');
            $dataTransaksi->whereYear('created_at', Carbon::parse($bulan)->year)
                ->whereMonth('created_at', Carbon::parse($bulan)->month);
        }

        $transaksi = $dataTransaksi->get();

        if ($transaksi->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data untuk bulan yang dipilih.');
        }

        $pdf = PDF::loadView('admin.dashboard.pembelian.laporan', ['transaksi' => $transaksi]);
        return $pdf->stream('Laporan-Pembelian-Barang.pdf');
    }

    public function cetaklaporanpendapatan(Request $request)
    {

        $bulan = $request->input('bulan');
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

        $transaksiKeluar = Transaksi::where('jenis_transaksi', '=', 'keluar')
        ->whereYear('created_at', Carbon::parse($bulan)->year)
        ->whereMonth('created_at', Carbon::parse($bulan)->month)
            ->get();


        $hargaModalBarang = 0;

        foreach ($transaksiKeluar as $transaksi) {
            $hargaModalBarang += $transaksi->jumlah * $transaksi->harga_pcs;
        }


        $hargaModalProduk = Produk::where('status', '=', 'Terjual')
            ->whereYear('created_at', Carbon::parse($bulan)->year)
            ->whereMonth('created_at', Carbon::parse($bulan)->month)
            ->sum('harga_modal');
        $totalSewa = Sewa::sum('harga_sewa');

        $totalPenjualan = Penjualan::whereYear('tanggal_transaksi', Carbon::parse($bulan)->year)
        ->whereMonth('tanggal_transaksi', Carbon::parse($bulan)->month)
            ->sum('harga');
        $hargaModal = $hargaModalBarang + $hargaModalProduk;


        // $pdf = new Dompdf();
        // $laporanBlade = view('admin.dashboard.penjualan.laporan-pendapatan', compact('hargaModalProduk', 'totalPenjualan', 'totalSewa', 'hargaModalBarang', 'hargaModal','namaBulan', 'tahunIni'))->render();

        // $pdf->loadHtml($laporanBlade);
        //
        // $pdf->render();

        // return $pdf->stream('Laporan-Pendapatan.pdf');
        $pdf = PDF::loadView('admin.dashboard.penjualan.laporan-pendapatan', compact('hargaModalProduk', 'totalPenjualan', 'totalSewa', 'hargaModalBarang', 'hargaModal', 'namaBulan', 'tahunIni'));
        $pdf->setPaper('A4','landscape');
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
