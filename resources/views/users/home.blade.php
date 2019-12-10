@extends('layouts.app')

@section('content')

	<h3 class="text-center">Vlasnici zivotinja</h3>

    @include('partials.sessions')


    @if(auth()->user()->owners->count() > 0)
        <div class="row">
            @foreach($owners as $owner)
                <div class="col-md-6 col-lg-4 text-center">
                    <div class="card animals-card">
                        <h4><a href="{{route('owners.edit', $owner->id)}}">{{$owner->first_name .' '. $owner->last_name}}</a></h4>
                        <div class="row">
                        @forelse($owner->animals as $animal)
                            <div class="col-md-4">
                                <li><a href="{{route('animals.show', $animal->id)}}">{{$animal->id_number}}</a></li>
                            </div>
                        @empty
                            <div class="col-md-12"><li>Vlasnik nema zivotinje</li></div>
                        @endforelse
                        </div>
                        <div class="animal-buttons">
                            <a href="{{route('animals.create', $owner->id)}}" class="btn btn-primary add-animal">Dodaj zivotinju</a>
                            <a href="{{route('owners.animals', $owner->id)}}" class="btn btn-primary add-animal">Sve zivotinje vlasnika</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="{{route('owners.create')}}" class="btn btn-primary add-animal">Dodaj vlasnika</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-4">
                <div class="card animals-card">
                    <h4>Morate uneti vlasnika ukoliko zelite dodati zivotinje</h4>
                    <a href="{{route('owners.create')}}" class="btn btn-primary add-animal">Dodaj vlasnika</a>
                </div>
            </div>
        </div>
    @endif


@endsection

