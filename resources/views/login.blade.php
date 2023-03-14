@extends('layouts.main')
@section('container')
<div class="sufee-login d-flex align-content-center justify-content-center flex-wrap">
    <div class="container">
        <div class="login-logo mt-5">
            <a class="logo-login" href="/">Ayesha Projek</a>
        </div>
        <div class="login-content">
            <div class="login-form">
                @if(session()->has('errorLogin'))
                <div class="alert alert-danger" role="alert">
                    {{ session('errorLogin')}}
                </div>
                @endif
                <form novalidate action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-light btn-submit mt-3">Sign in</button>

                    <div class="register-link mt-3 text-center">
                        <p>Don't have account ? <a href="/register"> Sign Up Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection