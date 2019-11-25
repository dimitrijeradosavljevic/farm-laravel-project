@extends('layouts.app')


@section('content')
	
	{{ $animal->id }}

	{{session('animal_not_found')}}
	<div class="mating-form">
		<h3>Unesi pripust</h3>
		<form method="POST" action="{{route('matings.store', $animal->id)}}">
			@csrf
			<div>
				<label>Datum pripusta:</label>
				<input type="date" name="date">
			</div>

			<div>
				<label>Id broj partnera pripusta:</label>
				<input type="number" name="partner_id">
			</div>

			<button type="submit">Unesi</button>
		</form>
	</div>



	{{-- Display the form based on gender (when its added to the animals table) --}}
	<div class="birth-form">
		<h3>Unesi Prasenje</h3>
		<form method="POST" action="{{route('births.store', $animal->id)}}">
			@csrf
			<div>
				<label>Datum prasenja:</label>
				<input type="date" name="date">
			</div>

			<div>
				<label>Red prasenja:</label>
				<input type="number" name="birth_number">
			</div>

			<div>
				<label>Zivorodjenih muskih:</label>
				<input type="number" name="males">
			</div>

			<div>
				<label>Zivorodjenih zenski:</label>
				<input type="number" name="females">
			</div>

			<div>
				<label>Mrtvo:</label>
				<input type="number" name="passed">
			</div>

			<div>
				<label>Mumificirano:</label>
				<input type="number" name="mummified">
			</div>

			<div>
				<label>Certifikat prasenja</label>
				<input type="number" name="birth_certificate">
			</div>

			<button type="submit">Unesi</button>

		</form>
	</div>

	{{-- Display form based on gender (when its added to the animals table) --}}
	<h3>Unesi zalucenje</h3>
	<div class="exclusion-form">
		<form method="POST" action="{{route('exclusions.store', $animal->id)}}">
			@csrf
			<div>
				<label>Datum zalucenja:</label>
				<input type="date" name="date">
			</div>

			<div>
				<label>Sa dana:</label>
				<input type="number" name="days_old">
			</div>

			<div>
				<label>Prasadi:</label>
				<input type="number" name="animals_count">
			</div>

			<div>
				<label>Masa legla(kg):</label>
				<input type="number" name="litter_weight">
			</div>

			<div>
				<label>Ocena legla:</label>
				<input type="number" name="litter_mark">
			</div>

			<div>
				<label>Ocena krmace:</label>
				<input type="number" name="mother_mark">
			</div>

			<div>
				<label>Odabrano za priplod M:</label>
				<input type="number" name="males_for_breeding">
			</div>

			<div>
				<label>Odabrano za priplod Z:</label>
				<input type="number" name="females_for_breeding">
			</div>

			<div>
				<label>Certifikat prasenja:</label>
				<input type="number" name="birth_certificate">
			</div>

			<button type="submit">Unesi</button>
		</form>
	</div>
	@include('partials.errors')
@endsection