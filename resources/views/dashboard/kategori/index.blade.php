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
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Kategori</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content">
        <div class="row">
            <div class="col-lg-1">
            <a class="btn btn-success mb-4" href="/kategori/create"><i class="fa fa-plus"></i></a>
        
            </div>
            <div class="col-lg-6">
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
                                <strong class="card-title">Data Kategori</strong>
                            </div>
                            
                            <div class="card-body">
                                
                                
                                
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
          @foreach ($kategori as $kategori)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->kategori_kode}}</td>
            <td>{{ $kategori->kategori_nama}}</td>
           
            <td>
              <a href="/kategori/{{$kategori->id}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
              <form action="/kategori/{{$kategori->id}}" method="post" class="d-inline">
					                            @method('DELETE')
					                            @csrf
					                            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fa fa-trash"></i></i></button>
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
            </div><!-- .animated -->
        </div><!-- .content -->

     

@endsection