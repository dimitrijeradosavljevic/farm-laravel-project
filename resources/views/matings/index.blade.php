@extends('layouts.app')

@section('content')
<div class="index-listing">
    <h1 class="text-center"> Pripusti <a href="{{route('animals.show', $animal->id)}}">{{$animal->id_number}}</a> zivotinje </h1>
    <div class="sub-table">
    @foreach($matings as $key => $mating)

        <div class="sub-table-body">
            <div class="col-pair">
                <span class="custom-col custom-col-head"><span>Datum</span></span>
                <span class="custom-col">{{$mating->date}}</span>
            </div>
            <div class="col-pair">
                <span class="custom-col custom-col-head"><span>Krmaca</span></span>
                <span class="custom-col">{{$mates[$key]}}</span>
            </div>
        </div>

    @endforeach
    </div>
</div>
@endsection
