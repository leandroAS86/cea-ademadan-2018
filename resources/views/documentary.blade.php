@extends('layouts.master')

@section('content')

	@include('layouts.error')

	@include('layouts.alert')

	<div class="container">
		@include('documentary.documentary')
	</div>
	
	<div class="container">
		@include('documentary.documentary_delete')
	</div>
	
	<div class="container">
		@include('video.video')
	</div>

@endsection