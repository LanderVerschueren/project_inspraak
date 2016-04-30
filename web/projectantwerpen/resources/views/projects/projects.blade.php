@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="filter" unselectable="on">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Filter</h4>
					</div>
					<div class="panel-body">
						<section>
							<h5>Type</h5>
							<span>
								<input id="checkbox_renovatie" type="checkbox" name="type" value="renovatie">
								<label id="label_renovatie" for="checkbox_renovatie">Renovatie</label>
							</span>
							<span>
								<input id="checkbox_heraanleg" type="checkbox" name="type" value="heraanleg">
								<label id="label_heraanleg" for="checkbox_heraanleg">Heraanleg</label>
							</span>
							<span>
								<input id="checkbox_opknapwerk" type="checkbox" name="type" value="opknapwerk">
								<label id="label_opknapwerk" for="checkbox_opknapwerk">Opknapwerk</label>
							</span>
						</section>
						<section>
							<h5>Fase</h5>
							<span>
								<input id="checkbox_mening" type="checkbox" name="fase" value="mening">
								<label id="label_mening" for="checkbox_mening">Meningen verzamelen</label>
							</span>
							<span>
								<input id="checkbox_afbraak" type="checkbox" name="fase" value="afbraak">
								<label id="label_afbraak" for="checkbox_afbraak">Afbraak</label>
							</span>
							<span>
								<input id="checkbox_opbouw" type="checkbox" name="fase" value="opbouw">
								<label id="label_opbouw" for="checkbox_opbouw">Opbouw</label>
							</span>
						</section> 
						<section>
							<h5>Aantal likes</h5>
							<span>
								<input id="checkbox_0" type="checkbox" name="likes" value="minder_dan_100">
								<label id="label_0" for="checkbox_0">< 100</label>
							</span>
							<span>
								<input id="checkbox_100" type="checkbox" name="likes" value="100_1000">
								<label id="label_100" for="checkbox_100">100 - 1000</label>
							</span>
							<span>
								<input id="checkbox_1000" type="checkbox" name="likes" value="meer_dan_1000">
								<label id="label_1000" for="checkbox_1000">> 1000</label>
							</span>
						</section>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="projects_list">
				@foreach($projects as $project)
<<<<<<< HEAD
					<section class="project_section">
=======
					<section>
>>>>>>> 6f1aab8745af9e2a01439cc59b9ef51e5aaeadfc
						<span>
							<img class="image-responsive" src="{{URL::asset('images/'.$project->fotonaam)}}" alt="">
						</span>
						<p>{{$project->uitleg}}</p>
					</section>
				@endforeach
			</div>
		</div>
	</div>
@endsection