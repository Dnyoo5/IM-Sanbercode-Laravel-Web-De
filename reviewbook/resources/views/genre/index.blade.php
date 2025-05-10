@extends('layout.master')

@section('content')
@section('title')
Genres
@endsection
    <h2>Daftar Genre</h2>
    <a href="/genre/create" class="btn btn-primary mb-3">Tambah Genre</a>
    @foreach($genres as $genre)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $genre->name }}</h5>
                <p>{{ $genre->description }}</p>
                <a href="/genre/{{ $genre->id }}" class="btn btn-sm btn-info">Detail</a>
                <a href="/genre/{{ $genre->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/genre/{{ $genre->id }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach

@endsection
