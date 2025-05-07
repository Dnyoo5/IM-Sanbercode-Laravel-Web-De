@extends('layout.master')


@section('content')

<div style="margin-top: 50px">
    <h1 style="font-weight: bold; text-transform: uppercase;text-align:center">Register</h1>
    <div style="width: 40px; height: 3px; background-color: #4CAF50; margin: 8px auto 40px;"></div>
</div>

<h1>Buat Account Baru</h1>
<h3>Sign Up Form</h3>
<form method="post" action="{{ route('welcome') }}">
    @csrf
    <label>First Name:</label>
    <input type="text" name="first_name" /><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" /><br><br>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" /> Male<br>
    <input type="radio" name="gender" value="Female" /> Female<br>
    <input type="radio" name="gender" value="Other" /> Other<br><br>

    <label>Nationality:</label>
    <select name="nationality">
        <option>Indonesian</option>
        <option>Singaporean</option>
        <option>Malaysian</option>
        <option>Australian</option>
    </select><br><br>

    <label>Language Spoken:</label><br>
    <input type="checkbox" name="language" value="Bahasa Indonesia" /> Bahasa Indonesia<br>
    <input type="checkbox" name="language" value="English" /> English<br>
    <input type="checkbox" name="language" value="Arabic" /> Arabic<br>
    <input type="checkbox" name="language" value="Japanese" /> Japanese<br><br>

    <label>Bio:</label><br>
    <textarea name="bio" rows="4" cols="40"></textarea><br><br>

    <input type="submit" value="Sign Up" />
</form>

@endsection



