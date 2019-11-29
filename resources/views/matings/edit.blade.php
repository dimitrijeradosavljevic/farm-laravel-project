@extends('layouts.app')


@section('content')

<h1>Listing of matings for specific animal</h1>

@include('partials.errors')

@include('partials.sessions')

@foreach($matings as $key => $mating)

    <form method="POST" action="{{route('matings.update', [$animal, $mating->id])}}">
        @csrf
        @method('PATCH')
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label>Datum pripusta:</label>
                    <input type="date" name="date" class="form-control" value="{{$mating->date}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{$animal->partnerNoun}}</label>
                    <input type="number" name="partner_id" class="form-control" value="{{$mates[$key]}}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Certifikat rodjenja:</label>

                    <input type="text" name="birth_certificate" class="form-control birth-certificate" value="@if ($mating->birth){{$mating->birth->birth_certificate}} @endif">
                    <div class="alert alert-warning mt-1">
                        <span>Unesite ovo polje samo ukoliko zelite da povezete pripust sa prasenjem</span>
                    </div>
                </div>
            </div>

        </div>
		<button class="btn btn-primary">Unesi</button>
	</form>

    <form method="POST" action="{{route('matings.destroy',  [$animal, $mating->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger custom-delete">Obrisi</button>
    </form>

@endforeach


@endsection
