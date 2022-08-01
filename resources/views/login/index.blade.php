@extends('layout.main')
@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin w-100 m-auto mt-5">
              @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('loginError') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
                <h1 class="h3 mb-3 fw-normal text-center">Please Log In</h1>
                <form action="/login" method="post">
                  @csrf
                  <div class="form-floating">
                    <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
                <small class="d-block mt-2 text-center">Not registered? <a href="/register" class="text-decoration-none">Register now</a></small>
            </main>
        </div>
    </div>
</div>
@endsection