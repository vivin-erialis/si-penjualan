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
<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row p-1">
                        <div class="col-md-10 mt-1">
                            <strong class="card-title">Data Kategori</strong>
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
                                <th>Nama </th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriproduk as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->nama_kategori}}</td>
                                <td>{{ $kategori->tipe}}</td>

                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $kategori['id'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="/admin/kategoriproduk/{{$kategori->id}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fa fa-trash"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Pop Up Edit -->
                            <div class="modal fade" id="editModal<?php echo $kategori['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row card-header">
                                            <div class="col">
                                                <strong>Edit Data Kategori</strong>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form action="/admin/kategoriproduk/{{ $kategori->id }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div>
                                                    <!-- <div class="row mb-3" hidden>
                            <label for="kategoriKode" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputs[0][kode_kategori]" id="kodeKategoriInput" readonly>
                            </div>
                        </div> -->
                                                    <div class="row mb-3">
                                                        <label for="kategoriNama" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="<?php echo $kategori['nama_kategori']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label">Tipe</label>
                                                        <div class="col-sm-9" style="display: flex;">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="tipe" value="produk" checked {{ $kategori->tipe == 'produk' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="tipeProduk">Produk</label>
                                                            </div>
                                                            <div class="form-check mx-3">
                                                                <input class="form-check-input" type="radio" name="tipe" value="sewa" {{ $kategori->tipe == 'sewa' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="tipeSewa">Sewa</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type="submit" class="btn btn-success btn-sm mx-1 mb-4 mt-2" style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    <!-- Pop Up Add -->
    <div class="modal fade" id="addModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row card-header">
                    <div class="col">
                        <strong>Tambah Data Kategori</strong>
                    </div>
                </div>
                <form action="/admin/kategoriproduk" method="POST">
                    @csrf
                    <div class="px-4 mt-4">
                        <!-- <div class="row mb-3" hidden>
                            <label for="kategoriKode" class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputs[0][kode_kategori]" id="kodeKategoriInput" readonly>
                            </div>
                        </div> -->
                        <div class="row mb-3">
                            <label for="kategoriNama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputs[0][nama_kategori]" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-9" style="display: flex;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="inputs[0][tipe]" value="produk">
                                    <label class="form-check-label" for="tipeProduk">Produk</label>
                                </div>
                                <div class="form-check mx-3">
                                    <input class="form-check-input" type="radio" name="inputs[0][tipe]" value="sewa">
                                    <label class="form-check-label" for="tipeSewa">Sewa</label>
                                </div>
                            </div>
                        </div>


                        <div class="mt-3">

                            <button type="submit" class="btn btn-success btn-sm mx-1 mb-4 mt-2" style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button>

                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!-- End Pop Up Add -->
    <!-- End Main Content -->

    @endsection