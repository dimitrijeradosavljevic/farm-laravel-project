@extends('layouts.app')

@section('content')
	    <h1>Ovde mozete promeniti prasenja</h1>

        @include('partials.errors')


        @foreach($animal->births as $birth)

            <form method="POST" action="{{route('births.update', [$animal->id, $birth->id])}}">
				@csrf
				@method('PATCH')
				<div>
					<label>Datum prasenja:</label>
					<input type="date" name="date" value="{{$birth->date}}">
				</div>
				<div>
					<label>Red prasenja:</label>
					<input type="number" name="birth_number" value="{{$birth->birth_number}}">
				</div>
				<div>
					<label>Zivorodjenih muskih:</label>
					<input type="number" name="males" value="{{$birth->males}}">
				</div>
				<div>
					<label>Zivorodjenih zenskih:</label>
					<input type="number" name="females" value="{{$birth->females}}">
				</div>
				<div>
					<label>Mrtvo:</label>
					<input type="number" name="passed" value="{{$birth->passed}}">
				</div>
				<div>
					<label>Mumificirano:</label>
					<input type="number" name="mummified" value="{{$birth->mummified}}">
				</div>
				<div>
					<label>Certifikat prasenja:</label>
					<input type="number" name="birth_certificate" value="{{$birth->birth_certificate}}">
				</div>
				<button type="submit" class="btn btn-primary">Izmeni</button>
			</form>

            <form method="POST" action="{{route('births.destroy', [$animal, $birth->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Obrisi</button>
            </form>
		@endforeach

@endsection
