@extends('layouts.master')

@section('content')

@include('layouts.error')

@include('layouts.alert')

<div class="container">
  <div class="row">
  	@if($type)
	    <div class="col" >
	    	@include('schedule.meetings')
            <hr>
            @include('schedule.audiences')
             <hr>
             @include('schedule.meeting_delete')
             <hr>
             @include('schedule.audience_delete')
	    </div>
	@else
		<div class="col" >
	            @include('schedule.presentation')
	            <hr>
	            @include('schedule.presentationgame')
	            <hr>
	             @include('schedule.instructional')
	            <hr>
	            @include('schedule.efforts')
	            <hr>
	            @include('schedule.presentation_delete')
	            <hr>
	            @include('schedule.presentationgame_delete')
	             <hr>
	             @include('schedule.instructional_delete')
	             <hr>
	            @include('schedule.effort_delete')
	            <hr>
	    </div>
	@endif
   </div>		
</div>
    
@endsection

