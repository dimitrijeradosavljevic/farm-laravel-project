@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Dodaj pripust</h1>

        @include('partials.errors')

    <form method="POST" action="{{route('matings.store', $animal)}}">
        @csrf
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Datum pripusta:</label>
                    <input type="date" name="date" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{$animal->partnerNoun}}</label>
                    <input type="number" name="partner_id" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Certifikat rodjenja:</label>

                    <input type="text" name="birth_certificate" class="form-control birth-certificate">
                    <div class="alert alert-warning mt-1">
                        <span>Unesite ovo polje samo ukoliko zelite da povezete pripust sa prasenjem</span>
                    </div>
                </div>
            </div>

        </div>
        <button class="btn btn-primary">Unesi</button>
    </form>

    <a class="btn btn-primary mt-5" href="{{route('animals.show', $animal->id)}}">Nazad</a>
</div>
@endsection
