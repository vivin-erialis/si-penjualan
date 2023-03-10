@extends('dashboard.layouts.main')
@section('container')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
    <div class="card-body">
      <h5 class="card-title">Datatables</h5>
      <a href="/kategori/create" class="btn btn-success ">Insert</a>
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Kategori</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kategori as $kategori)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->kategori_kode}}</td>
            <td>{{ $kategori->kategori_nama}}</td>
            <td>{{ $kategori->created_at}}</td>
            <td>{{ $kategori->updated_at}}</td>
            <td>
              <a href="/" class="btn btn-warning">Edit</a>
              <a href="/" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        </tbody>
        @endforeach
</div>
</div>
</div>
</div>

@endsection