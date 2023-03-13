@extends('dashboard.layouts.main')
@section('container')

<div class="pagetitle">
<h1>Form Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Kategori</li>
        </ol>
      </nav>
</div>
<!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Horizontal Form</h5>

              <!-- Horizontal Form -->
              <form action="/kategori/{{ $kategori->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                  <label for="kategoriKode" class="col-sm-2 col-form-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('kategori_kode') is-invalid @enderror"  name="kategori_kode" value="{{ old ('kategori_kode', $kategori->kategori_kode ) }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kategoriNama" class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('kategori_nama') is-invalid @enderror"  name="kategori_nama" value="{{ old ('kategori_nama', $kategori->kategori_nama ) }}">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->
              
            </div>
          </div>

</div>
</div>
        
          

@endsection