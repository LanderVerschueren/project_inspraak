@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="addProject">
					<a href="{{ url('/project/addproject') }}" class="btn btn-raised btn-default" role="button">Project toevoegen</a>
				</div>

				@foreach( $projects as $project )				
				<div class="admin_list">
					<section class="image">
						<img src="{{ URL::asset('images/' . $project->title . '/' . $project->image_name) }}" alt="">
					</section>
					<section class="titel">
						<h4>{{ ucfirst($project->title) }}</h4>
						<h5>{{ ucfirst( $project->category ) }}</h5>
					</section>
					<section class="btn_aanpassen">
						<a href="{{ url('/project/update/'.$project->id) }}" class="btn btn-raised btn-default" role="button">Aanpassen</a>
						<a href="{{ url('/project/delete/'.$project->id) }}" class="btn btn-raised btn-default" role="button">Verwijderen</a>
					</section>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection