@extends('layout.master')

@section('content')
@section('title')
    Create
@endsection
    <h2>Tambah Genre</h2>
    <form method="POST" action="/genre">
        @csrf
        <div class="mb-3">
            <label>Nama Genre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

@endsection
