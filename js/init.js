

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
		if($('li.current-menu-item a').attr('title')) {
			if($('li.current-menu-item a').attr('title') == 'menu-header') {
				$('li.current-menu-item').addClass('active');
				$('li.current-menu-item > a.collapsible-header:first-child').addClass('active');
				$('li.current-menu-item > ul.collapsible-body').css('display','block');
			}
		}

		// Standard staff information form fields can be prepopulated via LDAP using the computing ID
		$('.ff-staff-computing-id input').on('change', function() {
			uvaComputingIdChanged('.ff-staff-computing-id input', '.ff-staff-name input', '.ff-staff-email input',
					'.ff-staff-phone input', '.ff-staff-affiliation select', '.ff-staff-department select', '.ff-staff-other-department input');
		});
		// If computing id not empty on page load then populate other staff fields
		if ($('.ff-staff-computing-id').length) {
			uvaComputingIdChanged('.ff-staff-computing-id input', '.ff-staff-name input', '.ff-staff-email input',
					'.ff-staff-phone input', '.ff-staff-affiliation select', '.ff-staff-department select', '.ff-staff-other-department input');
		}

		// Standard student information form fields can be prepopulated via LDAP using their computing ID
		$('.ff-student-computing-id input').change(function() {
			uvaStudentComputingIdChanged('.ff-student-computing-id input', '.ff-student-first-name input', '.ff-student-nick-name input',
					'.ff-student-last-name input', '.ff-student-email input', '.ff-student-phone input', '.ff-student-affiliation select',
					'.ff-student-department select', '.ff-student-other-department input');
		});

		// Only allow future dates via the calendar for date fields found on forms.
		// Optional classes can have first day allowed be a week out and not allow for weekend days to be selected.
		$('.ff-date input').each(function (i){
			$(this).datepicker('option', 'minDate', '+0').datepicker('option', 'yearRange', '-0:+2').datepicker('refresh');
		});
		$('.ff-date.week-out input').each(function (i){
			$(this).datepicker('option', 'minDate', '+8').datepicker('refresh');
		});
		$('.ff-date.no-weekend input').each(function (i){
			$(this).datepicker('option', 'beforeShowDay', $.datepicker.noWeekends).datepicker('refresh');
		});

    // Student Personnel Action Form - add some CSS to the page content so that if the print
    // feature is selected only the important form data is displayed on the output.
    if ($('.student-personnel-action-form').length) {
    	$('<style media="print">#main article > * {position: static; overflow: visible;} #masthead, #mega-menu, div.breadcrumbs, #comments, #sideNav, footer {display: none;}</style>').appendTo('head');
    }


  }); // end of document ready
})(jQuery); // end of jQuery name space
