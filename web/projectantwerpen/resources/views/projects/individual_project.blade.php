@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="project">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>{{$project->titel}}</h4>
					</div>
					<div class="panel-body">
						<form>
							<section class="main_info">							
								<section class="image">
									<img src="{{ URL::asset('images/'.$project->fotonaam) }}" alt="">
								</section>
								<section class="info">
									<ul>
										<li>
											<label>Einddatum:</label>
											<label> {{$project->einddatum}} </label>
										</li>
										<li>
											<label>Kostprijs:</label>
											<label> {{$project->kostprijs}} </label>
										</li>
										<li>
											<label>Categorie</label>
											<label> {{ ucfirst( $project->categorie) }} </label>
										</li>
									</ul>
								</section>
							</section>
							<section class="question">
								<section>
									<p> {{ $project->vraag }} </p>
								</section>
								<section class="button">
									<form action="/vote" method="GET">
										<button type="submit"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
										<button type="submit"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></button>
									</form>
								</section>
							</section>
							<section class="timeline_explanation">
						    	<section class="timeline">
										<div id="timeline">
											<div class="timeline-item <?= ($project->fase >= 1) ? 'selected' : '' ?>">
												<div class="timeline-icon">
													<i class="fa fa-comment-o" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													<h4>Mening</h4>
												</div>
											</div>

											<div class="timeline-item <?= ($project->fase >= 2) ? 'selected' : '' ?>">
												<div class="timeline-icon">
													<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													<h4>Afbraak</h4>
												</div>
											</div>

											<div class="timeline-item <?= ($project->fase == 3) ? 'selected' : '' ?>">
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
						    		<p>{{$project->uitleg}}</p>
						    	</section>
					    	</section>
				    	</form>
				  	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection