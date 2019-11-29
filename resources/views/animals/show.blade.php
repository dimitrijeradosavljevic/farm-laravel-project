@extends('layouts.app')

@section('before-content')
    <div class="divider"></div>
@endsection

@section('content')

        <div class="family-tree-holder">
            <div class="full-row-holder">
                @foreach($animal->getParents()[1] as $key => $parent)
                    <div class="row-full">
                        @if($key == 0)
                            <div class="row-title">Otac</div>
                        @else
                            <div class="row-title">Majka</div>
                        @endif
                        <div>HB\RB: {{$parent->hb}}</div>
                        <div>Id: {{$parent->id_number}}</div>
                        <div>TB: {{$parent->tattoo_number}}</div>
                    </div>
                @endforeach
            </div>
            <div class="half-row-holder">
                @foreach($animal->getParents()[2] as $key => $grandparent)

                    <div class="row-half">
                        @if($key == 0)
                            <div class="row-title">O.O</div>
                        @elseif($key == 1)
                            <div class="row-title">O.M</div>
                        @elseif($key == 2)
                            <div class="row-title">M.O</div>
                        @elseif($key == 3)
                            <div class="row-title">M.M</div>
                        @endif
                        <div>{{$grandparent->hb}}</div>
                        <div>{{$grandparent->id_number}}</div>
                        <div>{{$grandparent->tattoo_number}}</div>
                    </div>

                @endforeach
            </div>
            <div class="quarter-row-holder">
                @foreach($animal->getParents()[3] as $key => $grandGrandparent)
                    <div class="row-quarter">
                        @if($key == 0)
                            <div class="row-title">O.O.O</div>
                        @elseif($key == 1)
                            <div class="row-title">O.O.M</div>
                        @elseif($key == 2)
                            <div class="row-title">O.M.O</div>
                        @elseif($key == 3)
                            <div class="row-title">O.M.M</div>
                        @elseif($key == 4)
                            <div class="row-title">M.O.O</div>
                        @elseif($key == 5)
                            <div class="row-title">M.O.M</div>
                        @elseif($key == 6)
                            <div class="row-title">M.M.O</div>
                        @elseif($key == 7)
                            <div class="row-title">M.M.M</div>
                        @endif
                        {{$grandGrandparent->identification_number}}
                    </div>

                @endforeach
            </div>
        </div>


<h3>Welcome to show animal</h3>
<p>ID Broj: {{$animal->id_number}}</p>
<p>Selekcijska markica: {{$animal->selection_mark}}</p>
<p>Maticni broj: {{$animal->identification_number}}</p>

@include('partials.sessions')

<div class="links-holder">
    <a href="{{route('matings.create', $animal->id)}}" class="btn btn-primary">Dodaj Pripust</a>
    <a href="{{route('matings.edit', $animal->id)}}" class="btn btn-primary">Izmeni Pripust</a>

    <a href="{{route('births.create', $animal->id)}}" class="btn btn-primary">Dodaj Prasenje</a>
    <a href="{{route('births.edit', $animal->id)}}" class="btn btn-primary">Izmenji prasenje</a>

    <a href="{{route('exclusions.create', $animal->id)}}" class="btn btn-primary">Dodaj Zalucenje</a>
    <a href="{{route('exclusions.edit', $animal->id)}}" class="btn btn-primary">Izmeni Zalucenje</a>
</div>

@if($animal->gender == 0)
    @include('animals.partials.full-table')

@else
    <div class="male-table">
        @include('animals.partials.matings-table')
    </div>
@endif



@endsection
