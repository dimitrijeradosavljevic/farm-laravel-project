@extends('layouts.app')

@section('content')

    <h1>Dodajte vlasnika</h1>

    <form method="POST" action="{{route('owners.store')}}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">Ime:</label>
                    <input type="text" name="first_name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name">Prezime:</label>
                    <input type="text" name="last_name" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="location">Lokacija:</label>
                    <input type="text" name="location" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="identifier">Sifra:</label>
                    <input type="number" name="identifier" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Unesi</button>
    </form>

@endsection
