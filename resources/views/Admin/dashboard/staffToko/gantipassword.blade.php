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
                        <strong class="card-title">Ganti Password</strong>
                    </div>

                </div>
            </div>
            <div class="card-body">

                <!-- resources/views/change_password.blade.php -->
                @auth
                <form action="{{ route('ganti.password.post') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Password Saat Ini</label>
                        <input type="password" class="form-control" name="current_password" id="current_password" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" required>
                    </div>
                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save mr-1"></i>Simpan Perubahan</button>
                </form>
                @endauth
            </div>
    </div>

</div>
</div>

@endsection