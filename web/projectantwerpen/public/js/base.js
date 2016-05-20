$(document).ready(function() {  
  	$("#carousel-example-generic").swiperight(function() {  
      	$(this).carousel('prev');  
	});  
	$("#carousel-example-generic").swipeleft(function() {  
	   	$(this).carousel('next');  
	});

	$('#datepicker').datepicker();

    

	// Variables
	var clickedTab = $(".tabs > .active");
	var tabWrapper = $(".tab__content");
	var activeTab = tabWrapper.find(".active");

	// Show tab on page load
	activeTab.show();

	// Set height of wrapper on page load

	$(".tabs > li").on("click", function() {

		// Remove class from active tab
		$(".tabs > li").removeClass("active");

		// Add class active to clicked tab
		$(this).addClass("active");

		// Update clickedTab variable
		clickedTab = $(".tabs .active");

		// fade out active tab
		activeTab.fadeOut(250, function() {

			// Remove active class all tabs
			$(".tab__content > li").removeClass("active");

			// Get index of clicked tab
			var clickedTabIndex = clickedTab.index();

			// Add class active to corresponding tab
			$(".tab__content > li").eq(clickedTabIndex).addClass("active");

			// update new active tab
			activeTab = $(".tab__content > .active");
			activeTab.delay(10).fadeIn(250);
		});
	});
}); 