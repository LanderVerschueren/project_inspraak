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
						<form id="form_filter" action="/projecten" method="GET">
							<section>
								<h5>Type</h5>
								<span>
									<input id="checkbox_renovatie" type="checkbox" name="type[]" value="renovatie" <?php if(isset($GET['type[]'])) echo "checked='checked'"; ?>>
									<label id="label_renovatie" for="checkbox_renovatie">Renovatie</label>
								</span>
								<span>
									<input id="checkbox_heraanleg" type="checkbox" name="type[]" value="heraanleg" >
									<label id="label_heraanleg" for="checkbox_heraanleg">Heraanleg</label>
								</span>
								<span>
									<input id="checkbox_opknapwerk" type="checkbox" name="type[]" value="opknapwerk">
									<label id="label_opknapwerk" for="checkbox_opknapwerk">Opknapwerk</label>
								</span>
							</section>
							<section>
								<h5>Fase</h5>
								<span>
									<input id="checkbox_mening" type="checkbox" name="fase[]" value="1" >
									<label id="label_mening" for="checkbox_mening">Meningen verzamelen</label>
								</span>
								<span>
									<input id="checkbox_afbraak" type="checkbox" name="fase[]" value="2" >
									<label id="label_afbraak" for="checkbox_afbraak">Afbraak</label>
								</span>
								<span>
									<input id="checkbox_opbouw" type="checkbox" name="fase[]" value="3" >
									<label id="label_opbouw" for="checkbox_opbouw">Opbouw</label>
								</span>
							</section> 
							<section>
								<h5>Aantal likes</h5>
								<span>
									<input id="checkbox_0" type="checkbox" name="likes[]" value="<100" >
									<label id="label_0" for="checkbox_0">< 100</label>
								</span>
								<span>
									<input id="checkbox_100" type="checkbox" name="likes[]" value="100_1000" >
									<label id="label_100" for="checkbox_100">100 - 1000</label>
								</span>
								<span>
									<input id="checkbox_1000" type="checkbox" name="likes[]" value=">1000" >
									<label id="label_1000" for="checkbox_1000">> 1000</label>
								</span>

								<button type="submit"> Verzend </button>
							</section>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="projects_list">
				
				@foreach($projects as $project)
					<section class="project_section" >
						<span class="image">
							<img class="image-responsive" src="{{URL::asset('images/'.$project->fotonaam)}}" alt="">
						</span>
						<span class="explanation">
							<p>{{$project->uitleg}}	</p>	
							<p><a href="{{ url('/project/'.$project->id) }}">Meer...</a></p>
						</span>
					</section>
				@endforeach
			</div>
		</div>
	</div>
@endsection