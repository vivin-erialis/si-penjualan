@extends('admin.dashboard.layouts.main')
@section('container')
<div class="row">
    <div class="col mt-1">
        @if (session()->has('pesan'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            {{ session('pesan') }}
        </div>
        @endif
    </div>
</div>
<div class="animated fadeIn">

    <div class="card">
        <div class="card-header">
            <div class="row p-2">
                <div class="col-md-10 mt-1">
                    <strong class="card-title">Data Staff</strong>
                </div>

            </div>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <!-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button> -->
                            <form action="/admin/petugas/{{ $item->id }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin akan menghapus data ?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>



    <div class="card">
        <div class="card-header">
            <div class="row p-2">
                <div class="col-md-10 mt-1">
                    <strong class="card-title">Tambah Akun Staff</strong>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="sufee-login d-flex align-content-center justify-content-center flex-wrap">

                <div class="container">
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                    <div class="login-form">

                        <form action="{{route('actionregister')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">

                                <label for="role"> Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-sm btn-success m-b-30 mt-3"><i class="fa fa-save mr-2"></i>Simpan</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

@endsection