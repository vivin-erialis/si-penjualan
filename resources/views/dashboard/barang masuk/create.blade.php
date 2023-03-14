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
                            <li><a href="/kategori/create">Forms</a></li>
                            <li class="active">Barang Masuk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Form Barang Masuk</strong></div>
                    <div class="card-body">
                        <form action="/barangMasuk" method="POST">
                            @csrf
                            <table class="table" id="table-kategori" name="table">
                                <tr>
                                    <td><input type="text" class="form-control" name="inputs[0][kode]" placeholder="masukkan kode"></td>
                                    <td><input type="text" class="form-control" name="inputs[0][nama_barang]" placeholder="masukan nama">
                                    <td><input type="text" class="form-control" name="inputs[0][jumlah]" placeholder="masukkan jumlah"></td>
                                    <td><input type="text" class="form-control" name="inputs[0][harga]" placeholder="masukan harga">
                                    <td><textarea name="inputs[0][keterangan]" id="" cols="30" rows="4"></textarea></td>
                                    </td>
                                    <td><button type="button" class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i></button></td>
                                </tr>
                            </table>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-sm mx-1">Submit</button>
                                <button type="reset" class="btn btn-secondary btn-sm mx-1">Reset</button>
                                <a href="/barangMasuk" class="btn btn-warning btn-sm mx-1">Cancel</a>
                            </div>
                        </form><!-- End Horizontal Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Page Title -->
@endsection