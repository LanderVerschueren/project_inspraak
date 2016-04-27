@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="filter">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Filter</h4>
					</div>
					<div class="panel-body">
						<section>
							<span>
								<input id="checkbox_renovatie" type="checkbox" name="type" value="renovatie">
								<label for="checkbox_renovatie">Renovatie</label>
							</span>
							<span>
								<input id="checkbox_heraanleg" type="checkbox" name="type" value="heraanleg">
								<label for="checkbox_heraanleg">Heraanleg</label>
							</span>
							<span>
								<input id="checkbox_opknapwerk" type="checkbox" name="type" value="opknapwerk">
								<label for="checkbox_opknapwerk">Opknapwerk</label>
							</span>
						</section>
						<section>
							<span>
								<input id="checkbox_mening" type="checkbox" name="fase" value="mening">
								<label for="checkbox_mening">Meningen verzamelen</label>
							</span>
							<span>
								<input id="checkbox_afbraak" type="checkbox" name="fase" value="afbraak">
								<label for="checkbox_afbraak">Afbraak</label>
							</span>
							<span>
								<input id="checkbox_opbouw" type="checkbox" name="fase" value="opbouw">
								<label for="checkbox_opbouw">Opbouw</label>
							</span>
						</section> 
						<section>
							<span>
								<input id="checkbox_0" type="checkbox" name="likes" value="minder_dan_100">
								<label for="checkbox_0">< 100</label>
							</span>
							<span>
								<input id="checkbox_100" type="checkbox" name="likes" value="100_1000">
								<label for="checkbox_100">100 - 1000</label>
							</span>
							<span>
								<input id="checkbox_1000" type="checkbox" name="likes" value="meer_dan_1000">
								<label for="checkbox_1000">> 1000</label>
							</span>
						</section>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="projects_list">
				<section>
					<span>
						<img class="image-responsive" src="{{ URL::asset('images/mas.jpg') }}" alt="">
					</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</section>
				<section class="odd">
					<span>
						<img class="image-responsive" src="{{ URL::asset('images/skyline.png') }}" alt="">
					</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</section>
				<section>
					<span>
						<img class="image-responsive" src="{{ URL::asset('images/mas.jpg') }}" alt="">
					</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</section>
			</div>
		</div>
	</div>
@endsection