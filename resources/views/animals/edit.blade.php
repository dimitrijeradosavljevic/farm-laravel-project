@extends('layouts.app')


@section('content')

	{{session('animal_not_found')}}

    <div class="mating-form mb-4">
		<h3 class="text-center">Unesi pripust</h3>
		<form method="POST" action="{{route('matings.store', $animal->id)}}">
			@csrf
			<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Datum pripusta:</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="partner_id">Id broj partnera pripusta:</label>
                        <input type="number" name="partner_id" class="form-control">
                    </div>
                </div>
            </div>

			<button type="submit" class="btn btn-primary">Unesi</button>
		</form>
	</div>


	{{-- Display the form based on gender (when its added to the animals table) --}}
	<div class="row">
        <div class="col-md-6">
            <div class="birth-form">
                <h3 class="text-center">Unesi Prasenje</h3>
                <form method="POST" action="{{route('births.store', $animal->id)}}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Datum prasenja:</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_number">Red prasenja:</label>
                                <input type="number" name="birth_number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="males">Zivorodjenih muskih:</label>
                                <input type="number" name="males" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="females">Zivorodjenih zenski:</label>
                                <input type="number" name="females" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="passed">Mrtvo:</label>
                                <input type="number" name="passed" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mummified">Mumificirano:</label>
                                <input type="number" name="mummified" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_certificate">Certifikat prasenja</label>
                                <input type="number" name="birth_certificate" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Unesi</button>

                </form>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Unesi zalucenje</h3>
            <div class="exclusion-form">
                <form method="POST" action="{{route('exclusions.store', $animal->id)}}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Datum zalucenja:</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="days_old">Sa dana:</label>
                                <input type="number" name="days_old" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="animals_count">Prasadi:</label>
                                <input type="number" name="animals_count" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="litter_weight">Masa legla(kg):</label>
                                <input type="number" name="litter_weight" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="litter_mark">Ocena legla:</label>
                                <input type="number" name="litter_mark" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mother_mark">Ocena krmace:</label>
                                <input type="number" name="mother_mark" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="males_for_breeding">Odabrano za priplod M:</label>
                                <input type="number" name="males_for_breeding" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="females_for_breeding">Odabrano za priplod Z:</label>
                                <input type="number" name="females_for_breeding" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_certificate">Certifikat prasenja:</label>
                                <input type="number" name="birth_certificate" class="form-control">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Unesi</button>
                </form>
            </div>
        </div>
    </div>

	@include('partials.errors')
@endsection
