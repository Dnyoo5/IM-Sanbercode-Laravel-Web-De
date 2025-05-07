@extends('layout.master')

@section('content')
<main class="main">

    <h1 style="font-weight: bold; text-transform: uppercase;text-align:center">Home</h1>
    <div style="width: 40px; height: 3px; background-color: #4CAF50; margin: 8px auto 40px;"></div>

    <h1>SanberBook</h1>
    <h2>Social Media Developer Santai Berkualitas</h2>
    <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>

    <h3>Benefit Join di SanberBook</h3>
    <ul>
        <li>Mendapatkan motivasi dari sesama developer</li>
        <li>Sharing knowledge dari para mastah Sanber</li>
        <li>Dibuat oleh calon web developer terbaik</li>
    </ul>

    <h3>Cara Bergabung ke SanberBook</h3>
    <ol>
        <li>Mengunjungi Website ini</li>
        <li>Mendaftar di <a href="{{ route('register') }}">Form Sign Up</a></li>
        <li>Selesai!</li>
    </ol>

</main>


@endsection
