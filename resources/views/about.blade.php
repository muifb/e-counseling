@extends('dashboard.layouts.main')

@section('container')
    <h1>About me!</h1>

    <h3> {{ $name }}</h3>
    <p>
        <span>{{ $email }}</span> <br>
        <span>{{ $alamat }}</span>
    </p>
@endsection
