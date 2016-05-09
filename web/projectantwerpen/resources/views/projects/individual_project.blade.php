@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 form_general" id="project">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Titel project</h4>
					</div>
					<div class="panel-body">
						<section class='wrapper'>
					    	<section>
					    		<img src="{{ URL::asset('images/meir-2.png') }}" alt="">
					    	</section>
					    	<section>
					    		<label>Einddatum</label>
					    		<label>kostprijs</label>
					    		<label>categorie</label>
					    	</section>
				    	</section>
				    	<section class="timeline">fase</section>
				    	<section class="info">
				    		<p>uitleg</p>
				    	</section>
				  	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection