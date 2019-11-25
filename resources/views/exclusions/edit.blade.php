@extends('layouts.app')

@section('content')

	<h1>Ovde mozete promeniti zalucenja</h1>

	@foreach($animal->exclusions as $exclusion)

        <form method="POST" action="{{route('exclusions.update', [$animal->id, $exclusion->id])}}">
			@csrf
			@method('PATCH')
			<div>
				<label>Datum zalucenja:</label>
				<input type="date" name="date" value="{{$exclusion->date}}">
			</div>
			<div>
				<label>Sa dana:</label>
				<input type="number" name="days_old" value="{{$exclusion->days_old}}">
			</div>
			<div>
				<label>Prasadi</label>
				<input type="number" name="animals_count" value="{{$exclusion->animals_count}}">
			</div>
			<div>
				<label>Masa legla(lg):</label>
				<input type="number" name="litter_weight" step=".01" value="{{$exclusion->litter_weight}}">
			</div>
			<div>
				<label>Ocena legla:</label>
				<input type="number" name="litter_mark" value="{{$exclusion->litter_mark}}">
			</div>
            <div>
                <label for="mother_mark">Ocena Krmace</label>
                <input type="number" name="mother_mark" value="{{$exclusion->mother_mark}}">
            </div>
            <div>
                <label for="males_for_breeding">Odabrano za priplod M:</label>
                <input type="number" name="males_for_breeding" value="{{$exclusion->males_for_breeding}}">
            </div>
            <div>
                <label for="females_for_breeding">Odabrano za priplod Z:</label>
                <input type="number" name="females_for_breeding" value="{{$exclusion->females_for_breeding}}">
            </div>
            <div>
                <label for="birth_certificate">Certifikat rodjenja</label>
                <input type="number" name="birth_certificate" value="{{$exclusion->birth->birth_certificate}}">
            </div>

			<button type="submit" class="btn btn-primary">Unesi</button>
		</form>

        <form method="POST" action="{{route('exclusions.destroy', [$animal, $exclusion->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Obrisi</button>
        </form>

	@endforeach

@endsection
