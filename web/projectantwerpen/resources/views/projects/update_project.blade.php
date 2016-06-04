@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 admin" id="project">
			<div class="panel panel-default">
				<form method="POST" action="{{ url('/update_project/'.$project->id) }}" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="panel-heading">
						<h4> <input type="text" class="form-control" name="title" placeholder="Titel" value=" {{ $project->title }} "></h4>
					</div>
					<div class="panel-body">
						<section class="main_info">					
							<section class="image form-group">
								<img id="preview" src="{{URL::asset('images/' . $project->title . '/' . $project->image_name)}}" alt="">
								<input type="file" id="img_preview" name="pic">
								<input type="text" readonly class="form-control" placeholder="Kies een afbeelding">
							</section>
							<section class="info">
								<ul>
									<li>
										<input type="text" id="datepicker" class="form-control" name="date" placeholder="Einddatum" value="{{ $project->date }}">
									</li>
									<li>
										<input type="text" class="form-control" name="cost" placeholder="Kostprijs" value="{{ $project->cost }}">
									</li>
									<li>
										<select name="category" class="form-control" required>
											<option>
												Selecteer Categorie
											</option>
											<option value="renovatie" <?= ($project->category == 'renovatie') ? 'selected' : '' ?>>
												Renovatie
											</option>
											<option value="heraanleg" <?= ($project->category == 'heraanleg') ? 'selected' : '' ?>>
												Heraanleg
											</option>
											<option value="opknapwerk" <?= ($project->category == 'opknapwerk') ? 'selected' : '' ?>>
												Opknapwerk
											</option>
										</select>
									</li>
								</ul>
							</section>
						</section>
						<section class="question">
							<textarea name="question" id="" cols="" rows="2"> {{ $project->question }} </textarea>
						</section>

						<section class="timeline_explanation">
							<section class="timeline">
										<select name="fase" class="form-control" required>
											<option>
												Selecteer Fase
											</option>
											<option value="1" <?= ($project->fase == '1') ? 'selected' : '' ?>>
												Mening
											</option>
											<option value="2" <?= ($project->fase == '2') ? 'selected' : '' ?>>
												Afbraak
											</option>
											<option value="3" <?= ($project->fase == '3') ? 'selected' : '' ?>>
												Opbouw
											</option>
										</select>
									</section>
									<section class="explanation">
										<textarea name="description" id="" cols="" rows="10"> {{ $project->description }} </textarea>
									</section>
								</section>
								<button type="submit" class="btn btn-raised btn-default"> Project Aanpassen </button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endsection