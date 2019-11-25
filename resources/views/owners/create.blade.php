@extends('layouts.app')

@section('content')

    <h1>Dodajte vlasnika</h1>

    <form method="POST" action="{{route('owners.store')}}">
        @csrf
        <div>
            <label for="first_name">Ime:</label>
            <input type="text" name="first_name">
        </div>
        <div>
            <label for="last_name">Prezime:</label>
            <input type="text" name="last_name">
        </div>
        <div>
            <label for="location">Lokacija:</label>
            <input type="text" name="location">
        </div>
        <div>
            <label for="identifier">Sifra:</label>
            <input type="number" name="identifier">
        </div>

        <button type="submit" class="btn btn-primary">Unesi</button>
    </form>

@endsection
