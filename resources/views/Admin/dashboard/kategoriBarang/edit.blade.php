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
              <li class="active">Kategori</li>
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
          <div class="card-header"><strong>Edit Kategori</strong></div>
          <div class="card-body">
            <form action="/kategori/{{ $kategori->id }}" method="POST">
              @method('PUT')
              @csrf
              <div class="row mb-3">
                <label for="kategoriKode" class="col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('kategori_kode') is-invalid @enderror" name="kategori_kode" value="{{ old ('kategori_kode', $kategori->kategori_kode ) }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="kategoriNama" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('kategori_nama') is-invalid @enderror" name="kategori_nama" value="{{ old ('kategori_nama', $kategori->kategori_nama ) }}">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success btn-sm">Save</button>
                <a href="/kategori" class="btn btn-warning btn-sm mx-1">Cancel</a>
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