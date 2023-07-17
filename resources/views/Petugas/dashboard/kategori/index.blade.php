@extends('admin.dashboard.layouts.main')
@section('container')
<!-- Main Content -->
<!-- @if (session('pesan'))
<script>
    Swal.fire('Berhasil', '{{ session('pesan') }}', 'success');
</script>
@endif -->
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
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->kategori_nama}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $kategori['id'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form action="/kategori/{{$kategori->id}}" method="post" class="d-inline">
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
                                        <div class="card-header"><strong>Edit Kategori</strong></div>
                                        <div class="card-body">
                                            <form action="/kategori/{{ $kategori->id }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="row mb-3">
                                                    <label for="kategoriNama" class="col-sm-3 col-form-label">Kategori</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control @error('kategori_nama') is-invalid @enderror" name="kategori_nama" value="<?php echo $kategori['kategori_nama']; ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success btn-sm save"><i class="fa fa-save mx-1"></i>Save</button>
                                                    <button type="button" class="btn btn-secondary btn-sm mx-1" data-bs-dismiss="modal"><i class="fa fa-close mx-1"></i>Close</button>

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
                        <strong class="fs-6">Form Kategori</strong>
                    </div>
                </div>
                <form action="/kategori" method="POST">
                    @csrf
                    <table class="table" id="table" name="table">
                        <tr>
                            <td>
                                <label class="mx-2" for="kategoriNama">Kategori</label>
                                <input type="text" class="form-control" name="inputs[0][kategori_nama]">
                            </td>
                            <td><button type="button" class="btn btn-dark btn-sm" style="margin-top: 29px;" name="add" id="add"><i class="fa fa-plus"></i></button></td>
                        </tr>
                    </table>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-success btn-sm mx-1"><i class="fa fa-save mx-1"></i> Save</button>
                        <button type="reset" class="btn btn-secondary btn-sm mx-1"><i class="fa fa-undo mx-1"></i>Reset</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Pop Up Add -->
<!-- End Main Content -->

@endsection