@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 form_general project" id="project">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>{{$project->titel}}</h4>
					</div>
					<div class="panel-body">
						<section class='wrapper'>
					    	<section>
					    		<img src="{{ URL::asset('images/'.$project->fotonaam) }}" alt="">
					    	</section>
					    	<section>
					    		<label>{{$project->einddatum}}</label>
					    		<label>{{$project->kostprijs}}</label>
					    		<label>{{$project->categorie}}</label>
					    	</section>
				    	</section>
				    	<section class="timeline">{{$project->fase}}</section>
				    	<section class="info">
				    		<p>{{$project->uitleg}}</p>
				    	</section>
				    	@if(Auth::User())
				    		<a href="{{ url('/project/follow/'.$project->id) }}" class="btn btn-primary" role="button">
                                <i class="fa fa-btn fa-user"></i>Volgen
                            </a>
                        @endif
                        @if(!Auth::User())
							Je moet ingelogd zijn om dit project te kunnen volgen!
                        @endif
				  	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection