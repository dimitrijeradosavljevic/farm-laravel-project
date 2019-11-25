@extends('layouts.app')


@section('content')

<h1>Listing of matings for specific animal</h1>

@include('partials.errors')
{{session('animal_not_found')}}

@foreach($animal->matings as $mating)

    <form method="POST" action="{{route('matings.update', [$animal, $mating->pivot->id])}}">
        @csrf
        @method('PATCH')
		<div class="form-group">
			<label>Datum pripusta:</label>
			<input type="date" name="date" class="form-control" value="{{$mating->pivot->date}}">
		</div>
		<div class="form-group">
			<label>{{$animal->genderNoun}}</label>
			<input type="number" name="partner_id" class="form-control" value="{{$mating->id_number}}">
		</div>

		<button class="btn btn-primary">Unesi</button>
	</form>

    <form method="POST" action="{{route('matings.destroy',  [$animal, $mating->pivot->id])}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Obrisi</button>
    </form>

@endforeach


@endsection
