@extends('admin.dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="col mt-1">
        @if (session()->has('pesan'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            {{ session('pesan') }}
        </div>
        @endif
    </div>
</div>
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row p-2">
                        <div class="col-md-10 mt-1">
                            <strong class="card-title">Data Transaksi</strong>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal" onclick="generateKodeTransaksi()">
                                <i class="fa fa-plus mr-1"></i>Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Transaksi</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->jenis_transaksi }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="/admin/transaksi/{{ $item->id }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Pop Up Edit -->
                            <div class="modal fade" id="editModal{{ $item->id }}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content px-3 pr-3">
                                        <div class="row card-header">
                                            <strong class="fs-6">Form Transaksi</strong>
                                        </div>

                                        <form action="/admin/transaksi/{{ $item->id }}" method="POST" class="p-3 mt-2">
                                            @method('PUT')
                                            @csrf
                                            <div>
                                                <div class="form-group">
                                                    <label for="kode_transaksi">Kode</label>
                                                    <input type="text" class="form-control" name="kode_transaksi" value="{{ $item->kode_transaksi }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_barang">Kode</label>
                                                    <input type="text" class="form-control" name="kode_barang" value="{{ $item->kode_barang }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_barang" class="mt-3">Nama Barang</label>
                                                    <input type="text" class="form-control" name="nama_barang" value="{{ $item->nama_barang }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="jenis_transaksi">Jenis Transaksi</label>
                                                    <select class="form-control" name="jenis_transaksi">
                                                        <option value="masuk" {{ $item->jenis_transaksi === 'masuk' ? 'selected' : '' }}>Barang Masuk</option>
                                                        <option value="keluar" {{ $item->jenis_transaksi === 'keluar' ? 'selected' : '' }}>Barang Keluar</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah</label>
                                                    <input type="number" class="form-control" name="jumlah" value="{{ $item->jumlah }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="submit" class="btn btn-success btn-sm mx-1"><i class="fa fa-save mx-1"></i> Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Pop Up Edit -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pop Up Add -->
<div class="modal fade" id="addModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaksiModalLabel">Form Transaksi Barang</h5>
            </div>
            <div class="modal-body">
                <form action="/admin/transaksi" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kodeTransaksi">Kode</label>
                        <input type="text" class="form-control" id="kodeTransaksiInput" name="kode_transaksi" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kode_barang">Barang</label>
                        <select class="form-control" name="kode_barang" id="kode_barang" required>
                            <!-- Ambil data barang dari database dan tampilkan sebagai pilihan -->
                            @foreach($barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_transaksi">Jenis Transaksi</label>
                        <select class="form-control" name="jenis_transaksi" id="jenis_transaksi" required>
                            <option value="masuk">Barang Masuk</option>
                            <option value="keluar">Barang Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success btn-sm mx-1"><i class="fa fa-save mx-1"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Pop Up Add -->
@endsection