@extends('dashboard.layouts.main')
@section('container')
<div class="row"><div class="col-lg-12"><div class="card"><div class="card-body"><h5 class="card-title">Datatables</h5><p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> 
<table class="table datatable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th><th scope="col">Position</th>
      <th scope="col">Age</th>
      <th scope="col">Start Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Brandon Jacob</td>
      <td>Designer</td>
      <td>28</td>
      <td>2016-05-25</td>
    </tr>
  </tbody>
@endsection