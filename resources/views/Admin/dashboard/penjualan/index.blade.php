@extends('admin.dashboard.layouts.main')
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
                <form id="dateRangeForm" class="form-inline" method="get" action="/admin/penjualan">
                    <div class="form-group">
                        <label for="startDate" class="mx-3">Tanggal Awal</label>
                        <input type="date" class="form-control" id="startDate" name="start_date" placeholder="Start Date"
                            value="{{ request('start_date') }}">
                    </div>
                    <div class="form-group mx-3 mb-2">
                        <label for="endDate" class="mx-3">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="endDate" name="end_date" placeholder="End Date"
                            value="{{ request('end_date') }}">
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm mb-2"><i class="fa fa-search"></i></button>
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
                                    href="{{ route('cetaklaporanpenjualan', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                                    target="_blank" style="color: white;">
                                    <i class="fa fa-print"></i> Laporan Penjualan
                                    <a class="btn btn-primary btn-sm btn-default mx-2"
                                        href="{{ route('cetaklaporanpendapatan', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
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
