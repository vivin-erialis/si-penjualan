@extends('petugas.dashboard.layouts.main')
@section('container')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col mt-1">
                @if (session()->has('pesan'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        {{ session('pesan') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row m-1">
            <div class="card p-2">
                <form id="dateRangeForm" class="form-inline" method="get" action="/petugas/penjualan">
                    <form id="dateRangeForm" class="form-inline" method="get" action="/petugas/pembelian">
                        <div class="form-group">
                            <label for="bulan" class="mx-3">Pilih Bulan</label>
                            <input type="month" class="form-control" id="bulan" name="bulan" value="{{ request('bulan') }}">
                        </div>

                        <button type="submit" class="btn btn-warning btn-sm mb-2 mx-3 mt-2"><i class="fa fa-search mr-2"></i>Cari</button>
                    </form>
                </form>
            </div>
            <!-- Add a form to select the date range -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row p-2">
                            <div class="col-md-7 mt-1">
                                <strong class="card-title">Data Penjualan</strong>
                            </div>
                            <div class="col-md-5" style="display: flex;">
                                <a class="btn btn-success btn-sm btn-default"
                                    href="{{ route('cetaklaporanpenjualan', ['bulan' => request('bulan')]) }}"
                                    target="_blank" style="color: white;">
                                    <i class="fa fa-print"></i> Laporan Penjualan
                                    <a class="btn btn-primary btn-sm btn-default mx-2"
                                        href="{{ route('cetaklaporanpendapatan', ['bulan' => request('bulan')]) }}"
                                        target="_blank" style="color: white;">
                                        <i class="fa fa-print"></i> Laporan Pendapatan
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $item->produk->nama_produk }}</td>
                                        <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endsection
