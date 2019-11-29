@extends('layouts.app')

@section('content')
    <h1 class="text-center">Dodaj Zalucenje</h1>

        @include('partials.errors')
        @include('partials.sessions')

    <form method="POST" action="{{route('exclusions.store', $animal->id)}}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Datum zalucenja:</label>
                    <input type="date" name="date" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sa dana:</label>
                    <input type="number" name="days_old" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Prasadi</label>
                    <input type="number" name="animals_count" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Masa legla(lg):</label>
                    <input type="number" name="litter_weight" class="form-control" step=".01">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ocena legla:</label>
                    <input type="number" name="litter_mark" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mother_mark">Ocena Krmace</label>
                    <input type="number" name="mother_mark" class="form-control" >
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
                    <label for="birth_certificate">Certifikat rodjenja</label>
                    <input type="number" name="birth_certificate" class="form-control">
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Unesi</button>
    </form>
@endsection
