@extends('layouts.app')

@section('content')
    <h1>Dodaj Prasenje</h1>

        @include('partials.errors')

    <form method="POST" action="{{route('births.store', $animal->id)}}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Datum prasenja:</label>
                    <input type="date" name="date" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Red prasenja:</label>
                    <input type="number" name="birth_number" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Zivorodjenih muskih:</label>
                    <input type="number" name="males" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Zivorodjenih zenskih:</label>
                    <input type="number" name="females" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mrtvo:</label>
                    <input type="number" name="passed" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mumificirano:</label>
                    <input type="number" name="mummified" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Certifikat prasenja:</label>
                    <input type="number" name="birth_certificate" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Unesi</button>
    </form>

@endsection
