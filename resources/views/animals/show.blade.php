@extends('layouts.app')

@section('content')



<h3>Welcome to show animal</h3>
<p>ID Broj: {{$animal->id_number}}</p>
<p>Selekcijska markica: {{$animal->selection_mark}}</p>
<p>Maticni broj: {{$animal->identification_number}}</p>


<div class="mating">
	<h3><a href="{{route('matings.edit', $animal->id)}}">Pripust</a></h3>


	@forelse($animal->matings as $mating)

        <p>{{$mating->id}}</p>
		<p>{{ $mating->pivot->date }}</p>
    @empty
        <p>Zivotinja nije imala pripust</p>
	@endforelse



</div>

@if($animal->gender == 0)
    <div class="births">
        <h3><a href="{{route('births.edit', $animal->id)}}">Prasenje</a></h3>

        @forelse($animal->births as $birth)

            {{$birth->date}}
        @empty
            <p>Zivotinja nema nijedno prasenje</p>
        @endforelse
    </div>
@endif

@if($animal->gender == 0)
    <div class="exclusions">
	    <h3><a href="{{route('exclusions.edit', $animal->id)}}">Zalucenje</a></h3>

	    @forelse($animal->exclusions as $exclusion)

		    {{$exclusion->date}}
        @empty
            <p>Nema zalucenja</p>
	    @endforelse
    </div>
@endif



@endsection
