@extends('layouts.app')

@section('content')

	<h1>Ovde mozete promeniti zalucenja</h1>

    @include("partials.errors")
    @include("partials.sessions")

	@foreach($exclusions as $exclusion)

        <form method="POST" action="{{route('exclusions.update', [$animal->id, $exclusion->id])}}">
			@csrf
			@method('PATCH')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Datum zalucenja:</label>
                        <input type="date" name="date" class="form-control" value="{{$exclusion->date}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sa dana:</label>
                        <input type="number" name="days_old" class="form-control" value="{{$exclusion->days_old}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Prasadi</label>
                        <input type="number" name="animals_count" class="form-control" value="{{$exclusion->animals_count}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Masa legla(lg):</label>
                        <input type="number" name="litter_weight" class="form-control" step=".01" value="{{$exclusion->litter_weight}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ocena legla:</label>
                        <input type="number" name="litter_mark" class="form-control" value="{{$exclusion->litter_mark}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mother_mark">Ocena Krmace</label>
                        <input type="number" name="mother_mark" class="form-control" value="{{$exclusion->mother_mark}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="males_for_breeding">Odabrano za priplod M:</label>
                        <input type="number" name="males_for_breeding" class="form-control" value="{{$exclusion->males_for_breeding}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="females_for_breeding">Odabrano za priplod Z:</label>
                        <input type="number" name="females_for_breeding" class="form-control" value="{{$exclusion->females_for_breeding}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birth_certificate">Certifikat rodjenja</label>
                        <input type="number" name="birth_certificate" class="form-control" value="{{$exclusion->birth->birth_certificate}}">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Unesi</button>
		</form>

        <form method="POST" action="{{route('exclusions.destroy', [$animal, $exclusion->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger custom-delete">Obrisi</button>
        </form>

	@endforeach

@endsection
