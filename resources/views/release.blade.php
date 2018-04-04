@extends('layouts.master')

@section('content')

@include('layouts.error')

@include('layouts.alert')

       

<div class="container">
	<div class="row">
   
      	<div class="col-sm-12" >
			@include('release.release')
			<hr>
      	</div>

      	<div class="col-sm-12" >
			@include('release.events')
			<hr>
      	</div>		
	 
	</div>
</div>


@endsection