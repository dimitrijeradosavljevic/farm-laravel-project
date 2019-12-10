@extends('layouts.app')

@section('content')
<div class="container">
	    <h1 class="text-center">Promeni prasenja</h1>

        @include('partials.errors')
        @include('partials.sessions')

        @foreach($animal->births as $birth)

            <form method="POST" action="{{route('births.update', [$animal->id, $birth->id])}}">
				@csrf
				@method('PATCH')
				<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Datum prasenja:</label>
                            <input type="date" name="date" class="form-control" value="{{$birth->date}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Red prasenja:</label>
                            <input type="number" name="birth_number" class="form-control" value="{{$birth->birth_number}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zivorodjenih muskih:</label>
                            <input type="number" name="males" class="form-control" value="{{$birth->males}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zivorodjenih zenskih:</label>
                            <input type="number" name="females" class="form-control" value="{{$birth->females}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mrtvo:</label>
                            <input type="number" name="passed" class="form-control" value="{{$birth->passed}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mumificirano:</label>
                            <input type="number" name="mummified" class="form-control" value="{{$birth->mummified}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Certifikat prasenja:</label>
                            <input type="number" name="birth_certificate" class="form-control" value="{{$birth->birth_certificate}}">
                        </div>
                    </div>
                </div>
				<button type="submit" class="btn btn-primary">Izmeni</button>
			</form>

            <form method="POST" action="{{route('births.destroy', [$animal, $birth->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger custom-delete">Obrisi</button>
            </form>
		@endforeach

        <a class="btn btn-primary mt-5" href="{{route('animals.show', $animal->id)}}">Nazad</a>
</div>
@endsection
