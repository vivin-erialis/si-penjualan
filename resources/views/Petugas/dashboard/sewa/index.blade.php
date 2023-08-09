@extends('petugas.dashboard.layouts.main')
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
                                <strong class="card-title">Data Sewa</strong>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addModal" onclick="generateKodeSewa()">
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
                                    <th>Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sewa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_sewa }}</td>
                                        <td>{{ $item->nama_penyewa }}</td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a class="btn btn-primary btn-sm btn-default"
                                                href="{{ route('cetakbuktisewa') }}" target="blank"><i
                                                    class="fa fa-print"></i></a>

                                            <form action="/petugas/sewa/{{ $item->id }}" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                    onclick="return confirm('Yakin akan menghapus data ?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Pop Up Edit -->
                                    <div class="modal fade" id="editModal{{ $item->id }}" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="row card-header">
                                                    <div class="col">
                                                        <strong>Form Data Sewa</strong>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/petugas/sewa/{{ $item->id }}" method="PUT">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="kodeSewa">Kode</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->kode_sewa }}" name="kode_sewa" readonly>
                                                        </div>
                                                        <div style="display: flex">
                                                            <div class="form-group">
                                                                <label for="nama_penyewa">Nama Penyewa</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                                class="fa fa-user"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_penyewa"
                                                                        value="{{ $item->nama_penyewa }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mx-1">
                                                                <label for="telp">Telepon</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                                class="fa fa-phone"></i></span>
                                                                    </div>
                                                                    <input type="number" class="form-control"
                                                                        name="telp" value="{{ $item->telp }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i
                                                                            class="fa fa-home"></i></span>
                                                                </div>
                                                                <textarea class="form-control" name="alamat" rows="2">{{ $item->alamat }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Produk</label>
                                                            <div style="display: flex;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="nama_produk" value="Papan Bunga" checked
                                                                        {{ $item->nama_produk == 'Papan Karangan' ? 'checked' : '' }}>
                                                                    <label class="form-check-label">Papan Karangan
                                                                        Bunga</label>
                                                                </div>
                                                                <div class="form-check mx-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="nama_produk" value="Hantaran Nikah" checked
                                                                        {{ $item->nama_produk == 'Hantaran Nikah' ? 'checked' : '' }}>
                                                                    <label class="form-check-label">Hantaran Nikah</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="display: flex">
                                                            <div class="form-group">
                                                                <label for="tanggal_sewa">Tanggal Sewa</label>
                                                                <input type="date" class="form-control"
                                                                    name="tanggal_sewa"
                                                                    value="{{ $item->tanggal_sewa }}">
                                                            </div>
                                                            <div class="form-group col-sm-8">
                                                                <label for="harga_sewa">Harga</label>
                                                                <div class="input-group mx-1">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Rp</span>
                                                                    </div>
                                                                    <input type="number" class="form-control"
                                                                        name="harga_sewa"
                                                                        value="{{ $item->harga_sewa }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deskripsi">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi" rows="4">{{ $item->deskripsi }}</textarea>
                                                        </div>
                                                </div>
                                                <div class="mt-2 mr-3">
                                                    <button type="submit" class="btn btn-success btn-sm mx-1 mb-4 mt-2"
                                                        style="float: right;"><i class="fa fa-save mx-1"></i>
                                                        Simpan</button>
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
    <div class="modal fade" id="addModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row card-header">
                    <div class="col">
                        <strong>Form Data Sewa</strong>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/petugas/sewa" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kodeSewa">Kode</label>
                            <input type="text" class="form-control" id="kodeSewaInput" name="kode_sewa" readonly>
                        </div>
                        <div style="display: flex">
                            <div class="form-group">
                                <label for="nama_penyewa">Nama Penyewa</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nama_penyewa">
                                </div>
                            </div>
                            <div class="form-group mx-1">
                                <label for="telp">Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="number" class="form-control" name="telp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-home"></i></span>
                                </div>
                                <textarea class="form-control" name="alamat" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Produk</label>
                            <div style="display: flex;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="nama_produk"
                                        value="Papan Bunga">
                                    <label class="form-check-label">Papan Karangan Bunga</label>
                                </div>
                                <div class="form-check mx-3">
                                    <input class="form-check-input" type="radio" name="nama_produk"
                                        value="Hantaran Nikah">
                                    <label class="form-check-label">Hantaran Nikah</label>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex">
                            <div class="form-group">
                                <label for="tanggal_sewa">Tanggal Sewa</label>
                                <input type="date" class="form-control" name="tanggal_sewa">
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="harga_sewa">Harga</label>
                                <div class="input-group mx-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="harga_sewa">
                                </div>
                            </div>
                        </div>






                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                        </div>
                </div>

                <div class="mt-2 mr-3">
                    <button type="submit" class="btn btn-success btn-sm mx-1 mb-4 mt-2" style="float: right;"><i
                            class="fa fa-save mx-1"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Pop Up Add -->
@endsection
