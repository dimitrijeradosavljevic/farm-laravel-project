@extends('layouts.app')

@section('content')
    <h1>Species</h1>
    @foreach($animals as $animal)
        {{$animal->id}} {{$animal->owner}}
        {{$animal->owner}}
    @endforeach
@endsection
