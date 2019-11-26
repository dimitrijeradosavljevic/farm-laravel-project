@extends('layouts.app')


@section('content')

<h1>Listing of matings for specific animal</h1>

@include('partials.errors')
{{session('animal_not_found')}}

@foreach($animal->matings as $mating)

    <form method="POST" action="{{route('matings.update', [$animal, $mating->pivot->id])}}">
        @csrf
        @method('PATCH')
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Datum pripusta:</label>
                    <input type="date" name="date" class="form-control" value="{{$mating->pivot->date}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{$animal->genderNoun}}</label>
                    <input type="number" name="partner_id" class="form-control" value="{{$mating->id_number}}">
                </div>
            </div>

        </div>
		<button class="btn btn-primary">Unesi</button>
	</form>

    <form method="POST" action="{{route('matings.destroy',  [$animal, $mating->pivot->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger custom-delete">Obrisi</button>
    </form>

@endforeach


@endsection
