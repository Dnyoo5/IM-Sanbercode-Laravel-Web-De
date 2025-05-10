@extends('layout.master')

@section('content')
@section('title')
    Show
@endsection
    <h2>Detail Genre</h2>
    <div class="card">
        <div class="card-body">
            <h5>{{ $genre->name }}</h5>
            <p>{{ $genre->description }}</p>
            <a href="/genre" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

@endsection
