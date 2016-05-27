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
						<form action="post">
							<section class="main_info">							
								<section class="image">
									<input type="file" name="pic" accept="image/*">
								</section>
								<section class="info admin">
									<ul>
										<li>
											<label for="einddatum">Naam:</label>
										</li>
										<li>
											<input type="text" name="title">
										</li>
									</ul>
									<ul>
										<li>
											<label for="einddatum">Einddatum:</label>
										</li>
										<li>
											<input type="text" id="datepicker" name="date">
										</li>
									</ul>
									<ul>
										<li>
											<label>Kostprijs:</label>
										</li>
										<li>
											<input type="text" name="cost">
										</li>
									</ul>
									<ul>
										<li>
											<label>Categorie:</label>
										</li>
										<li>
											<input type="text" name="category">
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
										<input type="checkbox" class="checkbox">
								      	<div class="steps-two">
								        	<i class="fa fa-exclamation-triangle steps-img" aria-hidden="true"></i>
								        	<h3 class="steps-name">
								          		Afbraak
								        	</h3>
								      	</div>
										<input type="checkbox" class="checkbox">
								      	<div class="steps-three">
								        	<i class="fa fa-cog steps-img" aria-hidden="true"></i>
								        	<h3 class="steps-name">
								         		Opbouw
								        	</h3>
								      	</div>
								    </div>
								    <input type="checkbox" class="checkbox">
								</section>
						    	<section class="explanation">
						    		<textarea name="description"></textarea>
						    	</section>
					    	</section>
				    	</form>
				  	</div>
			  	</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	    $('.checkbox').on('change', function() {
	    	console.log('miauw');
		    $('.checkbox').not(this).prop('checked', false);  
		});
    </script>
@endsection