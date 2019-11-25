@extends('layouts.app')

@section('content')

	<h3>Pogledajte vase zivotinje</h3>
	@foreach(auth()->user()->animals as $animal)

	<div><a href="{{route('animals.show', $animal->id)}}">{{$animal->identification_number}}</a></div>

	@endforeach
	

@endsection