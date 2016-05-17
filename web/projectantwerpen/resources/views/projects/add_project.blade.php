@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="project">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Titel</h4>
					</div>
					<div class="panel-body">
						<form action="">
							<section class="main_info">							
								<section class="image">
									<img src="" alt="">
								</section>
								<section class="info admin">
									<ul>
										<li>
											<label for="einddatum">Einddatum:</label>
										</li>
										<li>
											<input type="text" id="datepicker">
										</li>
									</ul>
									<ul>
										<li>
											<label>Kostprijs:</label>
										</li>
										<li>
											<input type="text">
										</li>
									</ul>
									<ul>
										<li>
											<label>Categorie:</label>
										</li>
										<li>
											<input type="text">
										</li>
									</ul>
								</section>
							</section>
							<section class="timeline">
						    	<section id="Steps" class="timeline steps-section">						    
						    		<div class="steps-timeline">
						    			<div class="steps-one">
								        	<i class="fa fa-comments steps-img" aria-hidden="true"></i>
								        	<h3 class="steps-name">
								          		Mening
								        	</h3>
								      	</div>

								      	<div class="steps-two">
								        	<i class="fa fa-exclamation-triangle steps-img" aria-hidden="true"></i>
								        	<h3 class="steps-name">
								          		Afbraak
								        	</h3>
								      	</div>

								      	<div class="steps-three">
								        	<i class="fa fa-cog steps-img" aria-hidden="true"></i>
								        	<h3 class="steps-name">
								         		Opbouw
								        	</h3>
								      	</div>
								    </div>
								</section>
						    	<section class="explanation">
						    		<p>uitleg</p>
						    	</section>
					    	</section>
				    	</form>
				  	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection