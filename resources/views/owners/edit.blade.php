@extends('layouts.app')

@section('content')
    <h1>Izmeni vlasnika {{$owner->first_name}}</h1>

    <form method="POST" action="{{route('owners.update', $owner->id)}}">
        @csrf
        @method('PATCH')
        <div>
            <label for="first_name">Ime:</label>
            <input type="text" name="first_name" value="{{$owner->first_name}}">
        </div>
        <div>
            <label for="last_name">Prezime:</label>
            <input type="text" name="last_name" value="{{$owner->last_name}}">
        </div>
        <div>
            <label for="location">Lokacija</label>
            <input type="text" name="location" value="{{$owner->location}}">
        </div>
        <div>
            <label for="identifier">Sifra:</label>
            <input type="number" name="identifier" value="{{$owner->identifier}}">
        </div>
        <button type="submit" class="btn btn-primary">Izmeni</button>

    </form>

    <form method="POST" action="{{route('owners.destroy', $owner->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Obrisi</button>
    </form>

@endsection
