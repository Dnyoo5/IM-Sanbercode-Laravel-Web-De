@extends('layouts.app')

@section('content')
@section('title')
    Edit
@endsection
    <h2>Edit Genre</h2>
    <form method="POST" action="/genre/{{ $genre->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Genre</label>
            <input type="text" name="name" class="form-control" value="{{ $genre->name }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $genre->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
