@extends('layouts.app')

@section('content')


    <div class="index-listing">
        <h1 class="text-center"> Prasenje <a href="{{route('animals.show', $animal->id)}}">{{$animal->id_number}}</a> zivotinje </h1>
        <div class="sub-table">
            @foreach($animal->births as $birth)

                <div class="sub-table-body">
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Datum</span></span>
                        <span class="custom-col">{{$birth->date}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Red Prasenja</span></span>
                        <span class="custom-col">{{$birth->birth_number}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Zivo M</span></span>
                        <span class="custom-col"><span>{{$birth->males}}</span></span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Zivo Z</span>
                        <span class="custom-col"><span>{{$birth->females}}</span></span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Mrtvo</span>
                        <span class="custom-col">{{$birth->passed}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Mumificirano</span>
                        <span class="custom-col">{{$birth->mummified}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Ukupno Prasadi</span>
                        <span class="custom-col">{{$birth->males + $birth->females}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Certifikat rodjenja</span>
                        <span class="custom-col">{{$birth->birth_certificate}}</span>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
