@extends('layout.master')

@section('content')
    <main>
        <div style="margin-top: 50px">
            <h1 style="font-weight: bold; text-transform: uppercase;text-align:center">Dashboard</h1>
            <div style="width: 40px; height: 3px; background-color: #4CAF50; margin: 8px auto 40px;"></div>
        </div>
        <h1>Selamat Datang {{ $firstName }} {{ $lastName }}</h1>
        <p>Terima kasih telah bergabung di SanberBook. Social Media kita bersama!</p>
    </main>


@endsection
