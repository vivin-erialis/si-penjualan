@extends('petugas.dashboard.layouts.main')
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
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row p-2">
                        <div class="col-md-10 mt-1">
                            <strong class="card-title">Data Barang</strong>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
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
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->kategoribarang->nama_kategori}}</td>
                                <td>{{ $barang->nama_barang}}</td>

                                <td>{{ $barang->stok}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $barang['id'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="/petugas/barang/{{$barang->id}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fa fa-trash"></i></i></button>
                                    </form>

                                </td>
                            </tr>

                            <!-- Pop Up Edit -->
                            <div class="modal fade" id="editModal<?php echo $barang['id'] ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row card-header">
                                            <strong>Edit Data Barang</strong>
                                        </div>

                                        <form action="/petugas/barang/{{ $barang->id }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="p-3 mt2">
                                                <!-- <div class="form-group" hidden>
                                                    <label for="kode">Kode</label>
                                                    <input type="text" class="form-control" name="kode" value="<?php echo $barang['kode']; ?>" readonly>
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="kode_kategori">Kategori</label>
                                                    <select class="form-control form-select mt-2" aria-label="Default select example" name="kode_kategori">
                                                        <option value="">-- Pilih Kategori --</option>
                                                        @foreach($kategoribarang as $kat)
                                                        <option value="{{ $kat->id }}" {{ $kat->id == $barang->kode_kategori ? 'selected' : '' }}>
                                                            {{ $kat->nama_kategori }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="mt-3">Nama Barang</label>
                                                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>">
                                                </div>

                                                <div class="form-group" hidden>
                                                    <label for="">Stok</label>
                                                    <input type="number" class="form-control" name="stok" value="<?php echo $barang['stok']; ?>" readonly>
                                                </div>

                                                <div class="mt-3">

                                                    <button type="submit" class="btn btn-success btn-sm mx-1 mb-2 mt-2" style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button>

                                                </div>
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
            <div class="row card-header">
                <div class="col-md-10">
                    <strong>Tambah Data Barang</strong>
                </div>

            </div>

            <form action="/petugas/barang" method="POST" class="p-2 mt-2">
                @csrf
                <div id="barang" style="display: flex;">
                    <!-- <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" id="kodeBarangInput" name="inputs[0][kode]" readonly>
                    </div> -->
                    <div class="form-group col-sm-6">
                        <label for="">Kategori</label>
                        <select class="form-control form-select" aria-label="Default select example" name="inputs[0][kode_kategori]" required>
                            <option>-- Pilih Kategori --</option>
                            @foreach($kategoribarang as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-5">
                        <label for="" class="">Nama Barang</label>
                        <input type="text" class="form-control" name="inputs[0][nama_barang]" required>
                    </div>

                    <div class="form-group" hidden>
                        <label for="">Stok</label>
                        <input type="number" class="form-control" name="inputs[0][stok]" value="0" readonly>
                    </div>
                    <div class="form-group" hidden>
                        <label for="">Stok</label>
                        <input type="number" class="form-control" name="inputs[0][stok]" value="0" readonly>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success btn-sm mx-1 mb-2 mt-2" style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Pop Up Add -->
@endsection
