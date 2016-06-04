@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 admin" id="project">
			<div class="panel panel-default">

				<form method="POST" action="/add_project" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="panel-heading">
						<h4> <input type="text" class="form-control" name="title" placeholder="Titel"> </h4>
					</div>
					<div class="panel-body">
						<section class="main_info">					
							<section class="image form-group">
								<img id="preview" src="{{URL::asset('images/no_image.png')}}" alt="">
								<input type="file" id="img_preview" name="pic">
								<input type="text" readonly class="form-control" placeholder="Kies een afbeelding">
							</section>
							<section class="info">
								<ul>
									<li>
										<input type="text" id="datepicker" class="form-control" name="date" placeholder="Einddatum">
									</li>
									<li>
										<input type="text" class="form-control" name="cost" placeholder="Kostprijs">
									</li>
									<li>
										<select name="category" class="form-control" required>
											<option>
												Selecteer Categorie
											</option>
											<option value="renovatie">
												Renovatie
											</option>
											<option value="heraanleg">
												Heraanleg
											</option>
											<option value="opknapwerk">
												Opknapwerk
											</option>
										</select>
									</li>
								</ul>
							</section>
						</section>
						<section class="question">
							<textarea name="question" id="" cols="" rows="2"></textarea>
						</section>

						<section class="timeline_explanation">
							<section class="timeline">
										<select name="fase" class="form-control" required>
											<option>
												Selecteer Fase
											</option>
											<option value="1">
												Mening
											</option>
											<option value="2">
												Afbraak
											</option>
											<option value="3">
												Opbouw
											</option>
										</select>
									</section>
									<section class="explanation">
										<textarea name="description" id="" cols="" rows="10"></textarea>
									</section>
								</section>
								<button type="submit" class="btn btn-raised btn-default"> Project Toevoegen </button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endsection