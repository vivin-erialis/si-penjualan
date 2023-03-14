@extends('dashboard.layouts.main')
@section('container')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/barangMasuk">Dashboard</a></li>
                            <li><a href="/barangMasuk">Table</a></li>
                            <li class="active">Barang Masuk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col mt-1">
            @if (session()->has('pesan'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                {{session ('pesan')}}
            </div>
            @endif
        </div>
    </div>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Barang Masuk</strong>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-1">
                            <a class="btn btn-success btn-sm mb-4 mt-3 px-4 pr-4" href="/barangMasuk/create">Tambah Data</a>
                        </div>
                        <table id="bootstrap-data-table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang_masuk as $barang_masuk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang_masuk->kode}}</td>
                                    <td>{{ $barang_masuk->nama_barang}}</td>
                                    <td>{{ $barang_masuk->jumlah}}</td>
                                    <td>Rp. {{ $barang_masuk->harga}}</td>
                                    <td>{{ $barang_masuk->keterangan}}</td>
                                    <td>
                                        <a href="/barangMasuk/{{$barang_masuk->id}}/edit" class="btn btn-warning btn-sm mx-1 mr-2"><i class="fa fa-edit"></i></a>
                                        <form action="/barangMasuk/{{$barang_masuk->id}}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fa fa-trash"></i></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection