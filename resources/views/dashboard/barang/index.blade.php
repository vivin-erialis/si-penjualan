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
                            <li><a href="/barang">Dashboard</a></li>
                            <li><a href="/barang">Table</a></li>
                            <li class="active">Barang</li>
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
                        <div class="row p-2">
                            <div class="col-md-10 mt-1">
                                <strong class="card-title">Data Kategori</strong>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                                    <i class="fa fa-plus mr-1"></i>Add Row
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
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->kode}}</td>
                                    <td>{{ $barang->kategori->kategori_kode}}</td>
                                    <td>{{ $barang->nama_barang}}</td>
                                    <td>@rp($barang->harga)</td>
                                    <td>{{ $barang->stok}}</td>
                                    <td>
                                        <a href="/barang/{{$barang->id}}/edit" class="btn btn-warning btn-sm mx-1 mr-2"><i class="fa fa-edit"></i></a>
                                        <form action="/barang/{{$barang->id}}" method="post" class="d-inline">
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
    </div>

    <!-- Pop Up Add -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row card-header">
                    <div class="col-md-10">
                        <strong class="fs-6">Form Barang</strong>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm mx-1" data-bs-dismiss="modal"><i class="fa fa-close"></i></button>
                    </div>
                </div>

                <form action="/barang" method="POST" class="p-3 mt-2">
                    @csrf
                    <div>
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" name="inputs[0][kode]">
                        </div>
                        <div class="frm-group">
                            <label for="">Kategori</label>
                            <select class="form-control form-select mt-2" aria-label="Default select example" name="inputs[0][id_kategori]">
                                @foreach($kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="mt-3">Nama Barang</label>
                            <input type="text" class="form-control" name="inputs[0][nama_barang]">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="bassic-addond1">Rp</span>
                                </div>
                                <input type="text" class="form-control" name="inputs[0][harga]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="text" class="form-control" name="inputs[0][stok]">
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success btn-sm mx-1"><i class="fa fa-save mx-1"></i> Save</button>
                        <button type="reset" class="btn btn-secondary btn-sm mx-1"><i class="fa fa-undo mx-1"></i>Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Pop Up Add -->
</div>
@endsection
