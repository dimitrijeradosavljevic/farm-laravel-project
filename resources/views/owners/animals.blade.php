@extends('layouts.app')

@section('content')
    <div class="custom-table-holder">
        <div class="custom-table">
            <div class="table-head">
                <div class="table-column">ID broj</div>
                <div class="table-column">HB</div>
                <div class="table-column">RB</div>
                <div class="table-column">Datum rodjenja</div>
                <div class="table-column">Vrsta</div>
                <div class="table-column">Pol</div>
                <div class="table-column">Uzrast pri prvom prasenju(dani)</div>
                <div class="table-column">Broj sisa L</div>
                <div class="table-column">Broj sisa D</div>
                <div class="table-column">Selekcijski broj</div>
                <div class="table-column">Registracioni broj</div>
                <div class="table-column">Tetovar</div>
                <div class="table-column">Vrsta rodjenja</div>
                <div class="table-column">Datum iskljucenja</div>
                <div class="table-column">Razlog iskljucenja</div>
            </div>
            @foreach($animals as $animal)
                <div class="table-row">
                    <div class="table-column"><a href="{{route('animals.show', $animal->id)}}">{{$animal->id_number}}</a></div>
                    <div class="table-column">{{$animal->hb}}</div>
                    <div class="table-column">{{$animal->rb}}</div>
                    <div class="table-column">{{$animal->birth_day}}</div>
                    <div class="table-column">{{$animal->breed->name}}</div>
                    <div class="table-column">{{$animal->gender}}</div>
                    <div class="table-column">{{$animal->days_in_first_mating}}</div>
                    <div class="table-column">{{$animal->left_tits}}</div>
                    <div class="table-column">{{$animal->right_tits}}</div>
                    <div class="table-column">{{$animal->selection_mark}}</div>
                    <div class="table-column">{{$animal->registration_number}}</div>
                    <div class="table-column">{{$animal->tattoo_number}}</div>
                    <div class="table-column">{{$animal->birth_type}}</div>
                    <div class="table-column">{{$animal->exclusion_date}}</div>
                    <div class="table-column">{{$animal->exclusion_reason}}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
