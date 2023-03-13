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
        <div class="card-header"><strong>Form Kategori</strong></div>
            <div class="card-body">
              

              <!-- Horizontal Form -->
              <form action="/kategori" method="POST">
                @csrf
                <table class="table table-bordered" id="table" name="table">
                <tr>
                    <td><input type="text" class="form-control" name="inputs[0][kategori_kode]" id="kategori_kode" placeholder="masukkan kode"></td>
                    <td><input type="text" class="form-control" name="inputs[0][kategori_nama]" placeholder="masukan kategori">
                    </td>                   
                    <td><button type="button" class="btn btn-success" name="add" id="add">Tambah Data</button></td>
                </tr>

            </table>
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