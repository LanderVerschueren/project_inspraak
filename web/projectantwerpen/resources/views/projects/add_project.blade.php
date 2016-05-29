@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="project">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4> Titel </h4>
					</div>
					<div class="panel-body">
						<form>
							<section class="main_info">							
								<section class="image">
									<img src="" alt="">
								</section>
								<section class="info">
									<ul>
										<li>
											<input type="text" id="datepicker" class="form-control" name="einddatum" placeholder="Einddatum">
										</li>
										<li>
											<input type="text" class="form-control" name="kostprijs" placeholder="Kostprijs">
										</li>
										<li>
											<select name="" class="form-control">
												<option>
													...
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
								<section>
									<p> Vraag </p>
								</section>
							</section>
							
							<section class="timeline_explanation">
						    	<section class="timeline">
										<div id="timeline">
											<div class="timeline-item">
												<div class="timeline-icon">
													<i class="fa fa-comment-o" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													<h4>Mening</h4>
												</div>
											</div>

											<div class="timeline-item">
												<div class="timeline-icon">
													<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													<h4>Afbraak</h4>
												</div>
											</div>

											<div class="timeline-item">
												<div class="timeline-icon">
													<i class="fa fa-cog" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													<h4>Opbouw</h4>
												</div>
											</div>
											<div class="timeline-item">
												<div class="timeline-icon">
													<i class="fa fa-check" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													
												</div>
											</div>
										</div>
						    	</section>
						    	<section class="explanation">
						    		<p> Uitleg </p>
						    	</section>
					    	</section>
					    	<a href="{{ url('/addProject') }}" class="btn btn-raised"> Project toevoegen </a>
				    	</form>
				  	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection