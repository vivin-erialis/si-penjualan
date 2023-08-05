@extends('admin.dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="col mt-1">
        @if (session()->has('pesan'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            {{session ('pesan')}}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col mt-1">
        <!-- Add a form to select the date range -->
        <form id="dateRangeForm" class="form-inline" method="get" action="/admin/penjualan">
            <div class="form-group mb-2">
                <label for="startDate" class="sr-only">Tanggal Awal</label>
                <input type="date" class="form-control" id="startDate" name="start_date" placeholder="Start Date" value="{{request('start_date')}}">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="endDate" class="sr-only">Tanggal Akhir</label>
                <input type="date" class="form-control" id="endDate" name="end_date" placeholder="End Date" value="{{request('end_date')}}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fa fa-search mr-2"></i>Cari</button>
        </form>
    </div>
</div>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row p-2">
                        <div class="col-md-10 mt-1">
                            <strong class="card-title">Data Penjualan</strong>
                        </div>
                        <div class="col-md-2">
                        <a class="btn btn-warning btn-sm btn-default" href="{{route('cetaklaporanpenjualan')}}" target="blank"><i class="fa fa-print"></i> Cetak Laporan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->kode_penjualan}}</td>
                                <td>{{$item->nama_produk}}</td>
                                <td>{{$item->tanggal_transaksi}}</td>
                                <td>Rp.{{$item->harga}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- resources/views/admin/dashboard/layouts/main.blade.php -->

                <!-- <script>
                    $(document).ready(function() {
                        $('#dateRangeForm').submit(function(event) {
                            event.preventDefault();
                            var startDate = $('#startDate').val();
                            var endDate = $('#endDate').val();

                            $.ajax({
                                url: 'api/admin/penjualan/by-date-range',
                                type: 'GET',
                                data: {
                                    start_date: startDate,
                                    end_date: endDate
                                },
                                success: function(data) {
                                    // Mengosongkan isi tabel sebelum mengisi dengan data baru
                                    $('tbody').empty();

                                    // Mengisi tabel dengan data penjualan yang baru
                                    $.each(data, function(index, penjualan) {
                                        var row = '<tr>' +
                                            '<td>' + (index + 1) + '</td>' +
                                            '<td>' + penjualan.kode + '</td>' +
                                            '<td>' + penjualan.nama + '</td>' +
                                            '<td>' + penjualan.tanggal_transaksi + '</td>' +
                                            '<td>' + penjualan.harga + '</td>' +
                                            '<td>Aksi</td>' +
                                            '</tr>';

                                        $('tbody').append(row);
                                    });
                                }
                            });
                        });
                    });
                </script> -->

                @endsection