@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-2">
            <div class="row border border-dark">Id broj</div>
            <div class="row border border-dark">Selekcijska markica</div>
            <div class="row border border-dark">Mat. br.</div>
            <div class="row border border-dark">HB/RB broj</div>
            <div class="row border border-dark">Datum rodjenja</div>
            <div class="row border border-dark">Uzrast pri prvo prasenju</div>
            <div class="row border border-dark">Broj sisa</div>
            <div class="row border border-dark">Rasa</div>
        </div>
        <div class="col-1">
            <div class="row border border-dark">{{$animal->id_number}}</div>
            <div class="row border border-dark">{{$animal->selection_mark}}</div>
            <div class="row border border-dark">{{$animal->identification_number}}</div>
            <div class="row border border-dark">{{$animal->hb . '/' . $animal->rb}}</div>
            <div class="row border border-dark">{{$animal->birth_day}}</div>
            <div class="row border border-dark">{{$animal->days_in_first_mating}}</div>
            <div class="row border border-dark">{{$animal->left_tits . '/' .$animal->right_tits}}</div>
            <div class="row border border-dark">{{$animal->breed->name}}</div>
        </div>
        @if($animal->parents[0])
            @include('animals.show-mini', ['name' => 'Otac', 'animal' => $animal->parents[0], 'colnum' => 3])
            <div class="col-6">
                    @foreach($animal->parents[0]->parents as $grandparent)
                        <div class="row">
                            @include('animals.show-mini', ['name' => $prefix[0], 'animal' => $grandparent, 'colnum' => 4])

                            <div class="col-8 d-flex flex-column justify-content-between">
                                @foreach($grandparent->parents as $grandgrandparent)
                                    <div class="row flex-grow-1 flex-shrink-1">
                                        <div class="col-6 border border-dark"> {{$prefix . ($grandgrandparent->gender) ? 'O.' : 'M.'}}</div>
                                        <div class="col-6 border border-dark">{{$grandgrandparent->identification_number}}</div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-2">
            <div class="row border border-dark bg-secondary">Odajivac</div>
            <div class="row border border-dark">Mesto</div>
            <div class="row border border-dark">Sifra</div>
            <div class="row border border-dark bg-secondary">Vlasnik</div>
            <div class="row border border-dark">Mesto</div>
            <div class="row border border-dark">Sifra</div>
            <div class="row border border-dark">Datum</div>
            <div class="row border border-dark">Razlog</div>
        </div>
        <div class="col-1">
            <div class="row border border-dark">{{$animal->owner->first_name . '/' . $animal->owner->last_name}}</div>
            <div class="row border border-dark">{{$animal->owner->location}}</div>
            <div class="row border border-dark">{{$animal->owner->identifier}}</div>
            <div class="row border border-dark">{{$animal->user->name}}</div>
            <div class="row border border-dark">{{$animal->user->location}}</div>
            <div class="row border border-dark">{{$animal->user->identifier}}</div>
            <div class="row border border-dark">{{$animal->exclusion_reason}}</div>
            <div class="row border border-dark">{{$animal->exclusion_date}}</div>
        </div>
        @include('animals.show-mini', ['name' => 'Majka', 'animal' => $animal->parents[1], 'colnum' => 3])
        <div class="col-6">
            @if($animal->parents[1])
                @foreach($animal->parents[1]->parents as $grandparent)
                    @php $prefix = $grandparent->gender ? 'M.O.' : 'M.M.' @endphp
                    <div class="row">
                        @include('animals.show-mini', ['name' => $prefix, 'animal' => $grandparent, 'colnum' => 4])

                        <div class="col-8 d-flex flex-column justify-content-between">
                            @foreach($grandparent->parents as $grandgrandparent)
                                <div class="row flex-grow-1 flex-shrink-1">
                                    <div class="col-6 border border-dark"></div>
                                    <div class="col-6 border border-dark">{{$grandgrandparent->identification_number}}</div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection