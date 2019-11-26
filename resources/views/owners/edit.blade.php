@extends('layouts.app')

@section('content')
    <h1>Izmeni vlasnika {{$owner->first_name}}</h1>

    <form method="POST" action="{{route('owners.update', $owner->id)}}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">Ime:</label>
                    <input type="text" name="first_name" class="form-control" value="{{$owner->first_name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Prezime:</label>
                    <input type="text" name="last_name" class="form-control" value="{{$owner->last_name}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location">Lokacija</label>
                    <input type="text" name="location" class="form-control" value="{{$owner->location}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="identifier">Sifra:</label>
                    <input type="number" name="identifier" class="form-control" value="{{$owner->identifier}}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Izmeni</button>

    </form>

    <form method="POST" action="{{route('owners.destroy', $owner->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger custom-delete">Obrisi</button>
    </form>

@endsection
