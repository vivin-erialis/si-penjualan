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
              <li><a href="/kategori">Dashboard</a></li>
              <li><a href="/kategori/create">Edit</a></li>
              <li class="active">Barang Masuk</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section mt-4">
    <div class="row">
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header"><strong>Edit Barang Masuk</strong></div>
          <div class="card-body">
            <form action="/barangMasuk/{{ $barang_masuk->id }}" method="POST">
              @method('PUT')
              @csrf
              <div class="row mb-3">
                <label for="kode" class="col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old ('kode', $barang_masuk->kode ) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="namaBarang" class="col-sm-3 col-form-label">Nama Barang</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old ('nama_barang', $barang_masuk->nama_barang ) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old ('jumlah', $barang_masuk->jumlah ) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old ('harga', $barang_masuk->harga ) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old ('keterangan', $barang_masuk->keterangan ) }}"></textarea>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success btn-sm">Save</button>
                <a href="/barangMasuk" class="btn btn-warning btn-sm mx-1">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- End Page Title -->
@endsection