@if(!is_null($videos))
	@foreach ($videos as $video)
		<div class="container">
		    <div class="row ">
		        <div class="col-md-12">
		            <div class="card card-default">
		                <div class="card-header"><h4>{{ $video->title }}</h4></div>

		                <div class="card-body">

							<div class="alert alert-dark" role="alert" >
							  	{{ $video->description }}
							</div>
						    
						    <br>
								<div class="media">
							        <div class="media-body">
							        	{!!LaravelVideoEmbed::parse($video->link) !!}
							        </div>
							    </div>
						    <br>
								            
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<hr>

	@endforeach
@endif 


