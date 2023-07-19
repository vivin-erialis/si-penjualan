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
        @if (session()->has('berhasil'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            {{session ('berhasil')}}
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
                            <strong class="card-title">Data Produk</strong>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
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
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $produk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $produk->kode_produk}}</td>
                                <td>{{ $produk->nama_produk}}</td>
                                <td>@rp($produk->harga)</td>
                                <td>{{ $produk->status}}</td>
                                <td>{{ $produk->deskripsi}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $produk['id'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="/admin/produk/{{$produk->id}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fa fa-trash"></i></i></button>
                                    </form>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#penjualanModal<?php echo $produk['id'] ?>">
                                        <i class="fa fa-check"></i>
                                    </button>

                                </td>
                            </tr>
                            <!-- Pop Up Penjualan -->
                            <div class="modal fade" id="penjualanModal<?php echo $produk['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="card-header"><strong>Form Penjualan</strong></div>
                                        <div class="card-body">
                                            <form action="/admin/produk" method="POST">
                                                @csrf
                                                <input type="hidden" name="produk_id" value="<?php echo $produk['id'] ?>">
                                                <div class="form-group">
                                                    <label for="kode_penjualan">Kode Penjualan</label>

                                                    <input type="text" class="form-control" name="kode_penjualan">

                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_produk">Nama Produk</label>

                                                    <input type="text" class="form-control" name="nama_produk" value="<?php echo $produk['nama_produk'] ?>" readonly>

                                                </div>

                                                <div class="form-group">
                                                    <label for="kode_kategori">Kategori</label>
                                                    <select class="form-control form-select mt-2" aria-label="Default select example" name="kode_kategori" disabled>
                                                        <option>-- Pilih Kategori --</option>
                                                        @foreach($kategoriproduk as $kategori)
                                                        <option value="{{ $kategori->id }}" {{ $kategori->id == $produk->kode_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tanggal_transaksi">Tanggal Transaksi</label>

                                                    <input type="date" class="form-control" name="tanggal_transaksi">

                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                                        </div>
                                                        <input type="number" class="form-control" name="harga" value="<?php echo $produk['harga'] ?>" readonly">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success btn-sm save"><i class="fa fa-save mx-1"></i>Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Pop Up Penjualan -->

                            <!-- Pop Up Edit -->

                            <div class="modal fade" id="editModal<?php echo $produk['id'] ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content px-3 pr-3">
                                        <div class="row card-header">
                                            <strong class="fs-6">Form Produk</strong>
                                        </div>

                                        <form action="/admin/produk/{{ $produk->id }}" method="POST" class="p-3 mt-2">
                                            @method('PUT')
                                            @csrf
                                            <div>
                                                <div class="form-group">
                                                    <label for="kode_produk">Kode Produk</label>
                                                    <input type="text" class="form-control" name="kode_produk" value="{{ $produk->kode_produk }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_kategori">Kategori</label>
                                                    <select class="form-control form-select mt-2" aria-label="Default select example" name="kode_kategori">
                                                        <option>-- Pilih Kategori --</option>
                                                        @foreach($kategoriproduk as $kategori)
                                                        <option value="{{ $kategori->id }}" {{ $kategori->id == $produk->kode_kategori ? 'selected' : '' }}>
                                                            {{ $kategori->nama_kategori }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama_produk" class="mt-3">Nama Produk</label>
                                                    <input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                                        </div>
                                                        <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control form-select mt-2" aria-label="Default select example" name="status">
                                                        <option value="0" {{ $produk->status == 'Belum Terjual' ? 'selected' : '' }}>Belum Terjual</option>
                                                        <option value="1" {{ $produk->status == 'Terjual' ? 'selected' : '' }}>Terjual</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div> -->
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi" rows="4">{{ $produk->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button type="submit" class="btn btn-success btn-sm mx-1"><i class="fa fa-save mx-1"></i> Save</button>
                                                <button type="reset" class="btn btn-secondary btn-sm mx-1"><i class="fa fa-undo mx-1"></i> Reset</button>
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
                    <strong class="fs-6">Form produk</strong>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-sm mx-1" data-bs-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
            </div>

            <form action="/admin/produk" method="POST" class="p-3 mt-2" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="form-group">
                        <label for="kode_produk">Kode Produk</label>
                        <input type="text" class="form-control" name="kode_produk">
                    </div>
                    <div class="form-group">
                        <label for="kode_kategori">Kategori</label>
                        <select class="form-control form-select mt-2" aria-label="Default select example" name="kode_kategori">
                            <option>-- Pilih Kategori --</option>
                            @foreach($kategoriproduk as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_produk" class="mt-3">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input type="number" class="form-control" name="harga">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control form-select mt-2" aria-label="Default select example" name="status">
                            <option value="Belum Terjual">Belum Terjual</option>
                            <option value="Terjual">Terjual</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div> -->
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-success btn-sm mx-1"><i class="fa fa-save mx-1"></i> Save</button>
                    <button type="reset" class="btn btn-secondary btn-sm mx-1"><i class="fa fa-undo mx-1"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Pop Up Add -->



@endsection