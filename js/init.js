

(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();


    $(".dropdown-button").dropdown();
      $('.slider').slider({full_width: true});

		// make sure sidebar navigation active item appears.
		if($('li').hasClass('active')) {
			$('li.active').parents('a.collapsible-header').addClass('active');
			$('li.active').parents('ul.collapsible-body').css('display','block');
		}
  }); // end of document ready
})(jQuery); // end of jQuery name space

