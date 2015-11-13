

(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();


    $(".dropdown-button").dropdown();
      $('.slider').slider({full_width: true});

  }); // end of document ready


  function toggleDiv(divId) {
$(‘.members’).fadeOut(‘fast’);
$(“#”+divId).slideToggle(‘slow’);
}

  
})(jQuery); // end of jQuery name space




