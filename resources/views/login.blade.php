@extends('layouts.main')
@section('container')
<div class="box">
    <div class="container">
        <div class="top">
            <span>Login </span>
            <header>AYESHA PROJECT</header>
        </div>
        @if(session()->has('errorLogin'))
        <div class="alert alert-danger" role="alert" style="border-radius: 30px;">
            {{ session('errorLogin')}}
        </div>
        @endif
        <form novalidate action="/login" method="post">
            @csrf
            <div class="input-field">
                <input type="text" class="input @error('email') is-invalid @enderror" name="email" placeholder="Username" id="" required>
                <i class='bx bx-user'></i>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" class="input @error('password') is-invalid @enderror" name="password" placeholder="Password" id="" required>
                <i class='bx bx-lock-alt'></i>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-field">
                <input type="submit" class="submit" value="Login" id="">
            </div>
        </form>
    </div>
</div>
@endsection
