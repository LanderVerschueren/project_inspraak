$(document).ready(function() {  
  	$("#carousel-example-generic").swiperight(function() {  
      	$(this).carousel('prev');  
	});  
	$("#carousel-example-generic").swipeleft(function() {  
	   	$(this).carousel('next');  
	});

	$('#datepicker').datepicker(); 

    /*$("#form_filter").on("change", "input:checkbox", function(){
        $("#form_filter").submit();
    });*/
}); 