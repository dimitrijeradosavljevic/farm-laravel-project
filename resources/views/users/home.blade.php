@extends('layouts.app')

@section('content')

	<h3 class="text-center">Vase zivotinje</h3>
    <div class="row">
        @foreach($owners as $owner)
            <div class="col-md-4 text-center">
                <h4><a href="{{route('owners.edit', $owner->id)}}">{{$owner->first_name .' '. $owner->last_name}}</a></h4>

                @foreach($owner->animals as $animal)
                    <li><a href="{{route('animals.show', $animal->id)}}">{{$animal->id_number}}</a></li>
                @endforeach


            </div>
        @endforeach
    </div>
@endsection
