@extends('layouts.master')

@section('content')

	@if($type)
		@include('plbm.presentation_sch')
		<hr>
		@include('plbm.presentation_games_sch')
		<hr>
		@include('plbm.instructional_sch')
		<hr>
		@include('plbm.efforts_sch')
		<hr>
	@else
		@include('plbm.presentations')
		<hr>
		@include('plbm.presentation_games')
		<hr>
		@include('plbm.instructional')
		<hr>
		@include('plbm.efforts')
		<hr>
		
	@endif

@endsection