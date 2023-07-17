@extends('dashboard.layouts.main')
@section('container')
    <!-- <div class="row">
        <div class="col mt-1">
            @if (session()->has('pesan'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                {{session ('pesan')}}
            </div>
            @endif
        </div>
    </div> -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row p-2">
                            <div class="col-md-10 mt-1">
                                <strong class="card-title">Data Barang Masuk</strong>
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
                                    <td>@rp($barang_masuk->harga)</td>
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
    </div>

    <!-- Pop Up Add -->
    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="row card-header">
                    <div class="col-md-10">
                        <strong class="fs-6">Form Barang Masuk</strong>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-sm mx-1" data-bs-dismiss="modal"><i class="fa fa-close"></i></button>
                    </div>
                </div>

                <form action="/barangMasuk" method="POST" class="p-3 mt-2">
                    @csrf
                    <div>
                        <div class="form-group">
                            <label for="kode">Id</label>
                            <input type="text" class="form-control" name="id">
                        </div>
                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" class="form-control" name="kode">

                        </div>
                        <div class="form-group">
                            <label for="barang_id">Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control" required>
                                <option value="">Pilih Barang</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="" class="mt-3">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="bassic-addond1">Rp</span>
                            </div>
                            <input type="number" class="form-control" name="harga">
                        </div>
                    </div>

            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-success btn-sm mx-1"><i class="fa fa-save mx-1"></i> Save</button>
                <button type="reset" class="btn btn-secondary btn-sm mx-1"><i class="fa fa-undo mx-1"></i>Reset</button>
            </div>
            </form>
        </div>
    </div>
<!-- End Pop Up Add -->
<script>
    $(document).ready(function() {
        // Fungsi untuk mengambil data barang
        function fetchBarangs() {
            $.ajax({
                url: "/barangMasuk",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Mengosongkan dropdown list
                    $('#barang_id').empty();
                    $('#barang_id').append('<option value="">Pilih Barang</option>');

                    // Menambahkan data barang ke dalam dropdown list
                    $.each(data, function(index, barang) {
                        $('#barang_id').append('<option value="' + barang.id + '">' + barang.nama_barang + '</option>');
                    });
                }
            });
        }

        // Memanggil fungsi fetchBarangs() saat modal ditampilkan
        $('#addModal').on('show.bs.modal', function(e) {
            fetchBarangs();
        });
    });
</script>


@endsection