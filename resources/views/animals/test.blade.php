@extends('layouts.app')

@section('content')

<h1>TEST</h1>

	<div class="row">
		<div class="col-md-6">{{$animal->father()->father()->father()}}</div>
	</div>
@endsection