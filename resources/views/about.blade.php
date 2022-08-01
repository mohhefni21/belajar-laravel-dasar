@extends('layout.main')
@section('container')
    <h1>Halaman About</h1>
    <p>Nama : {{ $name }}</p>
    <p>Email : {{ $email }}</p>
    <img src="{{ $image }}" height="100px" class="rounded-circle">
@endsection