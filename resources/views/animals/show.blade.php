@extends('layouts.app')

@section('content')



<h3>Welcome to show animal</h3>
<p>ID Broj: {{$animal->id_number}}</p>
<p>Selekcijska markica: {{$animal->selection_mark}}</p>
<p>Maticni broj: {{$animal->identification_number}}</p>


<div class="mating">
	<h3><a href="{{route('matings.edit', $animal->id)}}">Matings</a></h3>
	
	
	@foreach($animal->matings as $mating)
		<p>{{$mating->id}}</p>
		<p>{{ $mating->pivot->date }}</p>
		
	@endforeach



</div>

<div class="births">
	<h3><a href="{{route('births.edit', $animal->id)}}">Births</a></h3>
	
	@foreach($animal->births as $birth)
		
		{{$birth->date}}
	
	@endforeach
</div>

<div class="exclusions">
	<h3><a href="{{route('exclusions.edit', $animal->id)}}">Exclusions</a></h3>
	
	@foreach($animal->exclusions as $exclusion)
	
		{{$exclusion->date}}
	
	@endforeach
</div>



@endsection