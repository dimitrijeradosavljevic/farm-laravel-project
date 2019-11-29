@if($errors->any())

<div class="alert-danger p-4">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>

@endif
