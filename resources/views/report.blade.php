@extends('layouts.master')

@section('content')

@include('layouts.error')

@include('layouts.alert')

@if($type == 1)

	@include('reports.meetings')
	<hr>
	@include('reports.audiences')
	<hr>
@elseif($type == 2)
	@include('reports.presentation')
	<hr>
	@include('reports.presentation_game')
	<hr>
	@include('reports.instructional')
	<hr>
	@include('reports.efforts')
	<hr>
@elseif($type == 3)
	@include('ibama.ibama')
	<hr>
	@include('ibama.ibama_delete')
	<hr>
@else
	@include('game.game')
	<hr>
	@include('game.game_delete')
	<hr>

@endif

@endsection


