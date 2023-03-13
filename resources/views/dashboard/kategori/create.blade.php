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
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
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
        <div class="card-header">Form Kategori</div>
            <div class="card-body">
              

              <!-- Horizontal Form -->
              <form action="/kategori" method="POST">
                @csrf
                @error('kategori_kode')
                {{ $message }}
                @enderror
                <div class="row mb-3">
                  
                  <div class="col-sm-12">
                  <label for="kategoriKode" col-form-label">Kode</label>
                    <input type="text" class="form-control @error('kategori_kode') is-invalid @enderror" id="kategori_kode" name="kategori_kode">
                  </div>
                </div>
                @error('kategori_nama')
                {{ $message }}
                @enderror
                <div class="row mb-4">
                  
                  <div class="col-sm-12">
                  <label for="kategoriNama" col-form-label">Kategori</label>
                    <input type="text" class="form-control @error('kategori_nama') is-invalid @enderror" id="kategori_nama" name="kategori_nama">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success btn-sm">Submit</button>
                  <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->
              
            </div>
          </div>

</div>
</div>
        
        </div>

        
</div>
<!-- End Page Title -->
    
          

@endsection