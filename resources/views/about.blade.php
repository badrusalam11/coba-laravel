@extends('layouts.main')
@section('container')
    
    <h1>Halaman {{ $title }}</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img width="200" src="img/{{ $image }}" alt="{{ $name }}" class="img-thumbnail rounded-circle">


@endsection