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
						<form id="form_filter" action="/projecten/filter" method="POST">
							<section>
								<h5>Type</h5>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_renovatie" type="checkbox" name="type[]" value="renovatie" >
                                        <label id="label_renovatie" for="checkbox_renovatie">Renovatie</label>
                                    </label>
								</div>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_heraanleg" type="checkbox" name="type[]" value="heraanleg">
                                        <label id="label_heraanleg" for="checkbox_heraanleg">Heraanleg</label>
                                    </label>
								</div>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_opknapwerk" type="checkbox" name="type[]" value="opknapwerk">
                                        <label id="label_opknapwerk" for="checkbox_opknapwerk">Opknapwerk</label>
                                    </label>
								</div>
							</section>
							<section>
								<h5>Fase</h5>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_mening" type="checkbox" name="fase[]" value="1">
                                        <label id="label_mening" for="checkbox_mening">Mening</label>
                                    </label>
								</div>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_afbraak" type="checkbox" name="fase[]" value="2">
                                        <label id="label_afbraak" for="checkbox_afbraak">Afbraak</label>
                                    </label>
								</div>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_opbouw" type="checkbox" name="fase[]" value="3">
                                        <label id="label_opbouw" for="checkbox_opbouw">Opbouw</label>
                                    </label>
								</div>
							</section> 
							<section>
								<h5>Aantal likes</h5>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_0" type="checkbox" name="likes[]" value="minder_dan_100">
                                        <label id="label_0" for="checkbox_0">< 100</label>
                                    </label>
								</div>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_100" type="checkbox" name="likes[]" value="100_1000">
                                        <label id="label_100" for="checkbox_100">100 - 1000</label>
                                    </label>
								</div>
								<div class="checkbox">
									<label>
                                        <input id="checkbox_1000" type="checkbox" name="likes[]" value="meer_dan_1000">
                                        <label id="label_1000" for="checkbox_1000">> 1000</label>
                                    </label>
								</div>

								<button type="submit" class="btn btn-raised btn-default"> Filter </button>
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
							<a href="{{ url('/project/'.$project->id) }}">
								<img src="{{URL::asset('images/'.$project->fotonaam)}}" alt="">
								<h4>
									<span>{{ $project->titel }}</span>
								</h4>
							</a>
						</span>
					</section>
				@endforeach
			</div>
		</div>
	</div>
@endsection