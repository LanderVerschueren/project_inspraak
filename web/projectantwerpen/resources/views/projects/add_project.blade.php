@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 admin" id="project">
			<div class="panel panel-default">

				<form method="POST" action="/add_project" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="panel-heading">
						<h4> <input type="text" class="form-control" name="title" placeholder="Titel" required> </h4>
					</div>
					<div class="panel-body">
						<section class="main_info">					
							<section class="image form-group">
								<img id="preview" src="{{URL::asset('images/no_image.png')}}" alt="">
								<input type="file" id="img_preview" name="pic" required>
								<input type="text" readonly class="form-control" placeholder="Kies een afbeelding">
							</section>
							<section class="info">
								<ul>
									<li>
										<input type="text" id="datepicker" class="form-control" name="date" placeholder="Einddatum" required>
									</li>
									<li>
										<input type="text" class="form-control" name="cost" placeholder="Kostprijs" required>
									</li>
									<li>
										<select name="category" class="form-control" required>
											<option value="">
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
							<textarea name="question" id="" cols="" rows="2" required=""></textarea>
						</section>

						<section class="timeline_explanation">
							<section class="timeline">
										<select name="phase" class="form-control" required>
											<option value="">
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
										<textarea name="description" id="" cols="" rows="10" required=""></textarea>
									</section>
								</section>
								<button type="submit" class="btn btn-raised"> Project Toevoegen </button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endsection