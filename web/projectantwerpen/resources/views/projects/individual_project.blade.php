@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="project">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>{{ ucfirst($project->title) }}</h4>
					</div>
					<div class="panel-body">
						<form>
							<section class="main_info">							
								<section class="image">
									<img src="{{ URL::asset('images/' . $project->title . '/' . $project->image_name) }}" alt="">
								</section>
								<section class="info">
									<ul>
										<li>
											<label>Einddatum:</label>
											<label> {{$project->date}} </label>
										</li>
										<li>
											<label>Kostprijs:</label>
											<label> {{$project->cost}} </label>
										</li>
										<li>
											<label>Categorie</label>
											<label> {{ ucfirst( $project->category) }} </label>
										</li>
									</ul>
								</section>
							</section>
							<section class="question">
								<section>
									<p> {{ $project->question }} </p>
								</section>
								<section class="button">
										<a href="{{ url('/vote/like/'.$project->id) }}" class="btn btn-raised">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
											<label>{{ $likes }}</label>
										</a>
										<a href="{{ url('/vote/dislike/'.$project->id) }}" class="btn btn-raised">
											<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
											<label>{{ $dislikes }}</label>
										</a>
									
								</section>
							</section>
							
							<section class="timeline_explanation">
						    	<section class="timeline">
										<div id="timeline">
											<div class="timeline-item <?= ($project->phase >= 1) ? 'selected' : '' ?>">
												<div class="timeline-icon">
													<i class="fa fa-comment-o" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													<h4>Mening</h4>
												</div>
											</div>

											<div class="timeline-item <?= ($project->phase >= 2) ? 'selected' : '' ?>">
												<div class="timeline-icon">
													<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
												</div>
												<div class="timeline-content right">
													<h4>Afbraak</h4>
												</div>
											</div>

											<div class="timeline-item <?= ($project->phase == 3) ? 'selected' : '' ?>">
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
						    		<p>{{$project->description}}</p>
						    	</section>
					    	</section>
				    	</form>
						<form action="{{ url('/reactie/'.$project->id) }}" method="post" >
					    	<section class="comments">
					    		<h4>Reacties</h4>
				    			@foreach ($comments as $comment)
				    				<section class="comment_section">
					    				<section class="reaction">
						    				@if($comment->fk_user == null)
												<h5>Anoniem</h5>
											@else
												<h5>{{$comment->user->name}}</h5>
						    				@endif
		    								<p>
		    									<i class="fa fa-comment" aria-hidden="true"></i>
		    									{{ucfirst( $comment->comment )}}
		    								</p>
	    								</section>
	    								@if ( !Auth::guest() AND Auth::user()->isAdmin() )
	    								<section class="delete">
		    								<a href="{{url('/deleteComment/'.$comment->id) }}" class="btn btn-raised">
		    									<i class="fa fa-trash-o" aria-hidden="true"></i>
	    									</a>
	    								</section>
	    								@endif
    								</section>
								@endforeach
								<textarea name="comment"></textarea>
								<button type="submit" class="btn btn-raised">Reactie plaatsen</button>
							</section>
						</form>
				  	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection