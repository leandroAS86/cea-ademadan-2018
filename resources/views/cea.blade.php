@extends('layouts.master')

@section('content')

	@if($type)
		@include('cea.evaluation')
		<hr>
		@include('cea.publichearing')
		<hr>
		
	@else
		@include('cea.meetings')
		<hr>
		@include('cea.audiences')
		<hr>
	@endif

@endsection