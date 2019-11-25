@extends('layouts.app')

@section('content')

	<h3>Vase zivotinje</h3>

    <ul>
        @foreach($owners as $owner)
            <li><a href="{{route('owners.edit', $owner->id)}}">{{$owner->first_name}}</a></li>
            <ul>
                @foreach($owner->animals as $animal)
                    <li><a href="{{route('animals.show', $animal->id)}}">{{$animal->id_number}}</a></li>
                @endforeach
            </ul>


        @endforeach
    </ul>
@endsection
