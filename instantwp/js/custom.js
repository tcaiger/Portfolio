/*!
 * Custom
 */
jQuery(function(){
  // ================================
	// Resize the header to the window size
	// ================================
	function setHeight() {
    	windowHeight = jQuery(window).innerHeight();

    	windowHeight = windowHeight;

      // ====== Homepage ============
    	jQuery('#headerwrap').css('min-height', windowHeight+70);
    	jQuery('#headerwrap h1').css('margin-top', windowHeight-160);

      // ====== Album Page ============
      jQuery('#workwrap').css('min-height', windowHeight+70);
      jQuery('#workwrap h1').css('margin-top', windowHeight-130);

      // ====== Portfolio Page ============
      jQuery('#aboutwrap').css('min-height', windowHeight+70);
      jQuery('#aboutwrap h1').css('margin-top', windowHeight-130);

  	};
  	setHeight();
  
	 jQuery(window).resize(function() {
      setHeight();
	});

  // =========================
  // ====== HEADER ============
  // =========================
  jQuery(window).on('scroll', function(){

    if(window.scrollY > 200 ){
      jQuery('.navbar-default').addClass('scroll');
    } else {
      jQuery('.navbar-default').removeClass('scroll');
    }
  }); 
});


