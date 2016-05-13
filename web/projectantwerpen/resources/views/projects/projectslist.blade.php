@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@foreach( $projects as $project )
				<section class="admin_list">
					<img src="{{ URL::asset('images/' . $project->fotonaam) }}" alt="">
					<p>{{ $project->titel }}</p>
					<a href="{{ url('/project/'.$project->id) }}" class="btn btn-primary" role="button">Aanpassen</a>
				</section>
				@endforeach
			</div>
		</div>
	</div>
@endsection