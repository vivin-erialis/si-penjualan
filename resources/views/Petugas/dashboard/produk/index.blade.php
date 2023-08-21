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
                           <a href="/petugas/produk/create" class="btn btn-sm btn-dark"> <i class="fa fa-plus mr-1"></i>Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga Modal</th>
                                <th>Harga Jual</th>
                                <th>Status</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $produk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $produk->nama_produk}}</td>
                                <td>@rp($produk->harga_modal)</td>
                                <td>@rp($produk->harga_jual)</td>
                                <td>{{ $produk->status}}</td>
                                <td><img src="../images/foto_produk/{{ $produk->foto}}" alt="{{ $produk->foto}}"></td>
                                <td>
                                    {{-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $produk['id'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button> --}}
                                    <form action="/petugas/produk/{{$produk->id}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fa fa-trash"></i></i></button>
                                    </form>

                                    @if($produk->status != 'Terjual')
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#penjualanModal<?php echo $produk['id'] ?>">
                                        <i class="fa fa-right-from-bracket"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            <!-- Pop Up Penjualan -->
                            <div class="modal fade" id="penjualanModal<?php echo $produk['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row card-header">
                                            <div class="col">
                                                <strong>Tambah Data Penjualan</strong>
                                            </div>
                                        </div>

                                        <form action="/petugas/penjualan" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="produk_id" value="<?php echo $produk['id'] ?>">
                                            <div class="p-3">

                                                <div class="form-group" hidden>
                                                    <label for="nama_produk">Nama Produk</label>

                                                    <input type="text" class="form-control" name="nama_produk" value="{{$produk['id']}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kode_kategori">Kategori</label>
                                                    <select class="form-control form-select mt-2" aria-label="Default select example" name="kode_kategori" readonly>
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
                                                        <input type="number" class="form-control" name="harga" value="<?php echo $produk['harga_jual'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="mt-3">

                                                    <button type="submit" class="btn btn-success btn-sm mx-1 mb-2 mt-2" style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- End Pop Up Penjualan -->

                            <!-- Pop Up Edit -->
                            <div class="modal fade" id="editModal<?php echo $produk['id'] ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="row card-header">
                                            <strong>Edit Data Produk</strong>
                                        </div>

                                        <form action="/petugas/produk/{{ $produk->id }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="p-3">
                                                <div class="form-group" hidden>
                                                    <label for="kode_produk">Kode Produk</label>
                                                    <input type="text" class="form-control" name="kode_produk" value="{{ $produk->kode_produk }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_kategori">Kategori</label>
                                                    <select class="form-control form-select" aria-label="Default select example" name="kode_kategori">
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
                                                    <!-- <label>Status</label> -->
                                                    <div style="display: flex;" hidden>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="Belum Terjual" {{ $produk->status == 'Belum Terjual' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Belum Terjual</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="Terjual" {{ $produk->status == 'Terjual' ? 'checked' : '' }}>
                                                            <label class="form-check-label">Terjual</label>
                                                        </div>
                                                    </div>
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

                                            <div class="mt-1">
                                                <button type="submit" class="btn btn-success btn-sm mx-3 mb-3" style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row card-header">
                <div class="col-md-10">
                    <strong>Tambah Data produk</strong>
                </div>
            </div>

            <form action="/petugas/produk" method="POST" class="p-2 mt-2" enctype="multipart/form-data">
                @csrf
                <div style="display: flex;">
                    <div class="col-sm-5">
                        <div class="form-group" hidden>
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" class="form-control" id="kodeProdukInput" name="kode_produk" readonly>
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
                            <input type="text" class="form-control" name="nama_produk" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="number" class="form-control" name="harga" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label>Status</label> -->
                            <div style="display: flex;" hidden>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="Belum Terjual" checked readonly>
                                    <label class="form-check-label">Belum Terjual</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="Terjual" readonly>
                                    <label class="form-check-label">Terjual</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" accept="image/jpeg, image/png, image/jpg, image/gif" onchange="validateFile(this)">
                            <small class="form-text text-muted">Pastikan foto berformat JPEG, PNG, JPG, atau GIF dan ukuran maksimal 2MB.</small>
                        </div>
                        <script>
                            function validateFile(input) {
                                const fileSize = input.files[0].size; // Mendapatkan ukuran file dalam bytes
                                const maxSize = 2 * 1024 * 1024; // 2MB dalam bytes

                                if (fileSize > maxSize) {
                                    alert('Ukuran foto melebihi 2MB. Silakan pilih foto dengan ukuran lebih kecil.');
                                    input.value = ''; // Menghapus file yang telah dipilih
                                }
                            }
                        </script>
                    </div>
                    <div class="col-sm-7 mt-2" id="komponen">

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-4">
                                <label for="nama_barang">Barang</label>
                                <select class="form-control form-select" id="kodeBarangSelect" aria-label="Default select example" name="kode_barang">
                                    {{-- <option>--Pilih--</option> --}}
                                    @foreach($barang as $barang)
                                    <option  value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="harga">Harga</label>
                                <input type="number" id="hargaInput" class="form-control" name="harga">
                            </div>
                            <div class="col-sm-3">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah">
                            </div>


                            <div class="col-sm-1">
                                <button type="button" class="btn btn-dark btn-sm" style="margin-left:-15px; margin-top: 31px;" name="add" id="add"><i class="fa fa-plus"></i></button>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success btn-sm mx-1 mb-2 mt-2" style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
<!-- End Pop Up Add -->

<script>
    let barang = $('#kodeBarangSelect').val()
    let idBarang = $('#kodeBarangSelect').attr('id')



    axios.post(`/api/get-DataBarang/${barang}`)
    .then(response=>{
        console.log(response)
        if(barang == response.data.nama_barang){
            $('#hargaInput').val(response.data[0].harga)
        }
        // else{
        //     $('#hargaInput').val('')
        // }
    }).catch()
</script>

@endsection
