@extends('layouts.app')

@section('content')

    <div class="index-listing">
        <h1 class="text-center"> Zalucnje <a href="{{route('animals.show', $animal->id)}}">{{$animal->id_number}}</a> zivotinje </h1>
        <div class="sub-table">
            @foreach($exclusions as $exclusion)

                <div class="sub-table-body">
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Datum</span></span>
                        <span class="custom-col">{{$exclusion->date}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Sa dana</span></span>
                        <span class="custom-col">{{$exclusion->days_old}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head"><span>Prasadi</span></span>
                        <span class="custom-col"><span>{{$exclusion->animals_count}}</span></span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Masa legla(kg)</span>
                        <span class="custom-col"><span>{{$exclusion->litter_weight}}</span></span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Ocena legla</span>
                        <span class="custom-col">{{$exclusion->litter_mark}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Ocena krmace</span>
                        <span class="custom-col">{{$exclusion->mother_mark}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Odabrano za priplod M</span>
                        <span class="custom-col">{{$exclusion->males_for_breeding}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Odabrano za priplod Z</span>
                        <span class="custom-col">{{$exclusion->females_for_breeding}}</span>
                    </div>
                    <div class="col-pair">
                        <span class="custom-col custom-col-head">Broj potvrde o prasenju</span>
                        <span class="custom-col">{{$exclusion->birth->birth_certificate}}</span>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection
