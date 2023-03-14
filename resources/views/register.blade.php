@extends('layouts.main')
@section('container')
<div class="sufee-login d-flex align-content-center justify-content-center flex-wrap">

        <div class="container">
            <div class="login-content">
            <div class="login-logo mt-5">
            <a class="logo-login" href="/">registrasi</a>
        </div>
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
                        <button type="submit" class="btn btn-submit btn-light btn-flat m-b-30 mt-3">Register</button>
                        <div class="register-link mt-3 text-center">
                            <p>Already have account ? <a href="/login"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
@endsection