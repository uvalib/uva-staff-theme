<?php
/**
 * Functions that apply Gravity Forms API features to support our needs. 
 */

// Make sure date/time functions work properly by having the time zone set correctly.
date_default_timezone_set('America/New_York');

// this function is called by filters and returns the requested user meta of the current user
//for all versions of WP
function populate_usermeta($meta_key){
	global $current_user;
	if (floatval(get_bloginfo('version','raw')) >= 3.3) {
		return $current_user->__get($meta_key);
	} else {
		//for older WP versions
		if (function_exists('get_currentuserinfo')) {
			get_currentuserinfo();
			foreach($current_user as $key => $value){
				if($key == $meta_key)
					return $value;
			}
		}
		return '';
	}
}

// if users are autocreated after netbadge authentication then the username will contain the uva computing id
// populate the field with "uva_computing_id" as the population parameter with the "login" of the current user
add_filter('gform_field_value_uva_computing_id', 
    create_function('', 
        '$value = (isset($_SERVER["REDIRECT_REMOTE_USER"])) ? $_SERVER["REDIRECT_REMOTE_USER"] : populate_usermeta(\'user_login\'); 
        return $value;' 
    )
);

// populate the field with "name" as the population parameter with the first and last name of the current user
add_filter('gform_field_value_user_name', 
    create_function('', 
        '$value = populate_usermeta(\'first_name\') . \' \' . populate_usermeta(\'last_name\'); 
        return $value;' 
    )
);

// populate the field with "email address" as the population parameter with the email of the current user
add_filter('gform_field_value_email_address', 
    create_function('', 
        '$value = populate_usermeta(\'user_email\'); 
        return $value;' 
    )
);

// populate a time field with the current time
add_filter('gform_field_value_current_time', 
    create_function('', 
        '$value = date(\'g:i a\'); 
        return $value;' 
    )
);

// Staff Purchase Request form: determine if this is a desiderata request so that its admin field 
// can be set.
// Test server form ID=25
// Prod server form ID=
add_filter('gform_pre_submission_filter_25', 'gf_set_purchase_request_admin_fields', 10, 1);
function gf_set_purchase_request_admin_fields($form){
	// For reserve purchases, only assign a fund code if it is a book or dissertation/thesis or music recording
	if (isset($_POST['input_61']) and ($_POST['input_61'] == 'Add to desiderata list')) {
			$_POST['input_63'] = 'Approved';
	}
	return $form;
}


// Staff Purchase Request form: adjust the notification based on rush or not
// Test server form ID=25
// Prod server form ID=
add_filter('gform_notification_25', 'gf_change_purchase_request_notification_email', 10, 2);
function gf_change_purchase_request_notification_email($notification, $form, $entry){
	// Check to see if this purchase is rush or not to adjust the subject line.
	if (isset($_POST['input_60']) and ($_POST['input_60'] == 'Yes')) {
		$subject = $notification['subject'];
		$notification['subject'] = 'Rush ' . $subject;
	}
/*	if ($notification['name'] == 'Admin Notification') {
		// Check to see if this purchase is to be put on course reserves or not.
		if (isset($_POST['input_37']) and ($_POST['input_37'] == 'Yes')) {
			// Course reserve purchases for music and video items do not go to acquisitions.
			// Only book and dissertation requests go to acquisitions.
			if (($_POST['input_9'] == 'Video') or ($_POST['input_9'] == 'Spoken-word Recording')) {
				$notification['to'] = 'rmc-res@virginia.edu';
				$notification['subject'] .= 'to Subject Librarian';
			} else if ($_POST['input_9'] == 'Music Score') {
				$notification['to'] = 'musiclib@virginia.edu,lb-mu-scores@virginia.edu';
				$notification['subject'] .= 'to Subject Librarian';
			} else {
				if ($_POST['input_9'] == 'Music Recording') {
					$notification['to'] = 'musiclib@virginia.edu,lb-mu-recordings@virginia.edu';
				} else {
					// Determine the routing based on the format and the library location for the course reserve
					if (isset($_POST['input_51']) and ($_POST['input_51'] != '')) {
						switch ($_POST['input_51']) {
							case 'Astronomy':
							case 'Brown Science & Engineering':
							case 'Chemistry':
							case 'Math':
								$notification['to'] = 'scires@virginia.edu'; break;
							case 'Clemons':
								$notification['to'] = 'clemres@virginia.edu'; break;
							case 'Fine Arts':
								$notification['to'] = 'artsres@virginia.edu'; break;
							case 'Music':
								$notification['to'] = 'musiclib@virginia.edu'; break;
							case 'Physics':
								$notification['to'] = 'physres@virginia.edu'; break;
							default:
						}
					}
				}
				if (($_POST['input_9'] == 'Journal Subscription') or ($_POST['input_9'] == 'Other')) {
					$notification['subject'] .= 'to Subject Librarian';
				} else {
					$notification['to'] .= ',lib-orders@virginia.edu';
					$notification['subject'] .= 'to Acquisitions';
				}
			}
		} else {
			// Not going on course reserve but we only want the request to go to a single location.
			// Duplicate the routing rules found in the notification section but check which format/department
			// has been selected so only one subject librarian gets the notifcation.
			if ($_POST['input_9'] == 'Music Score') {
				$notification['to'] = 'lb-mu-scores@virginia.edu';
				$notification['subject'] .= 'to Subject Librarian';
			} else if ($_POST['input_9'] == 'Music Recording') {
				$notification['to'] = 'lb-mu-recordings@virginia.edu,lib-orders@virginia.edu';
				$notification['subject'] .= 'to Acquisitions';
			} else if (($_POST['input_9'] == 'Video') or ($_POST['input_9'] == 'Spoken-word Recording')) {
				$notification['to'] = 'Libselect_video@virginia.edu';
				$notification['subject'] .= 'to Subject Librarian';
			} else if ($_POST['input_9'] == 'Graphic Novel') {
				$notification['to'] = 'lib-graphic-novels@virginia.edu,lib-orders@virginia.edu';
				$notification['subject'] .= 'to Acquisitions';
			} else {
				// NOTE: $_POST['input_2'] is the UVa Computing ID field.
				// Special patrons will not be routed based on the department.
				if (in_array(trim($_POST['input_2']), $special_patrons_array)) {
					$notification['to'] = 'lib-purchase-requests@virginia.edu';
					$notification['subject'] .= 'from ' . $_POST['input_2'] . ' to Subject Librarian';
				} else if (isset($_POST['input_6']) and ($_POST['input_6'] != '')) {
					// Determine the routing based on the user department. Identify the subject librarian.
					switch ($_POST['input_6']) {
						case 'Anthropology':
							$notification['to'] = 'lib-anthropology-books@virginia.edu'; break;
						case 'Archaeology':
							$notification['to'] = 'lib-archaeology-books@virginia.edu'; break;
						case 'Architecture':
						case 'Architectural History':
						case 'Landscape Architecture':
							$notification['to'] = 'lib-architecture-books@virginia.edu'; break;
						case 'Art':
							$notification['to'] = 'fal-purchase-req@virginia.edu'; break;
						case 'Astronomy':
							$notification['to'] = 'lib-astronomy-books@virginia.edu'; break;
						case 'Batten School':
							$notification['to'] = 'battenbooks@virginia.edu'; break;
						case 'Biology':
							$notification['to'] = 'lib-biology-books@virginia.edu'; break;
						case 'Biomedical Engineering':
							$notification['to'] = 'biomed-engineer-book@virginia.edu'; break;
						case 'Chemical Engineering':
							$notification['to'] = 'chemical-engineer-book@virginia.edu'; break;
						case 'Chemistry':
							$notification['to'] = 'lib-chemistry-books@virginia.edu'; break;
						case 'Classics':
							$notification['to'] = 'lib-classics-books@virginia.edu'; break;
						case 'Civil Eng. and Applied Mathematics':
						case 'Civil and Environmental Engineering':
						case 'Electrical and Computer Engineering':
						case 'Engineering':
						case 'Mechanical and Aerospace Engineering':
						case 'Systems and Information Engineering':
							$notification['to'] = 'lib-engineering-books@virginia.edu'; break;
						case 'Commerce':
						case 'Economics':
							$notification['to'] = 'businessbooks@virginia.edu'; break;
						case 'Computer Science':
							$notification['to'] = 'lib-comp-sci-books@virginia.edu'; break;
						case 'Drama':
							$notification['to'] = 'lib-drama-books@virginia.edu'; break;
						case 'East Asian':
							$notification['to'] = 'lib-east-asian-books@virginia.edu'; break;
						case 'Education':
							$notification['to'] = 'CLIC_LibrariansMyGroup@virginia.edu'; break;
						case 'English':
							$notification['to'] = 'lb-english@virginia.edu'; break;
						case 'Environmental Sciences':
							$notification['to'] = 'lib-env-sci-books@virginia.edu'; break;
						case 'French':
							$notification['to'] = 'lib-french-books@virginia.edu'; break;
						case 'German':
							$notification['to'] = 'germanbooks@virginia.edu'; break;
						case 'History':
							$notification['to'] = 'historybooks@virginia.edu'; break;
						case 'Library':
							$notification['to'] = 'lib-library-requests@virginia.edu'; break;
						case 'Materials Science and Eng.':
							$notification['to'] = 'material-sci-eng-books@virginia.edu'; break;
						case 'Mathematics':
							$notification['to'] = 'lib-mathematics-books@virginia.edu'; break;
						case 'Media Studies':
							$notification['to'] = 'lb-media-studies-books@virginia.edu'; break;
						case 'Middle Eastern and South Asian':
							$notification['to'] = 'mideast-southasia-book@virginia.edu'; break;
						case 'Music':
							$notification['to'] = 'lb-mu-books@virginia.edu'; break;
						case 'Philosophy':
							$notification['to'] = 'philosophybooks@virginia.edu'; break;
						case 'Physics':
							$notification['to'] = 'lib-physics-books@virginia.edu'; break;
						case 'Politics':
							$notification['to'] = 'politicsbooks@virginia.edu'; break;
						case 'Psychology':
							$notification['to'] = 'lib-psychology-books@virginia.edu'; break;
						case 'Religious Studies':
							$notification['to'] = 'relstudiesbooks@virginia.edu'; break;
						case 'Science, Technology and Society':
							$notification['to'] = 'sci-tech-society-books@virginia.edu'; break;
						case 'Slavic':
							$notification['to'] = 'slavicbooks@virginia.edu'; break;
						case 'Sociology':
							$notification['to'] = 'lb-Sociology@virginia.edu'; break;
						case 'Spanish, Italian, and Portuguese':
							$notification['to'] = 'span-ital-port-books@virginia.edu'; break;
						case 'Statistics':
							$notification['to'] = 'lib-statistics-books@virginia.edu'; break;
						case 'Women, Gender, & Sexuality':
							$notification['to'] = 'lb-wgsbooks@virginia.edu'; break;
						default:
							$notification['to'] = 'lib-orders@virginia.edu';
					}
					switch ($_POST['input_6']) {
						case 'Anthropology':
						case 'Archaeology':
						case 'Classics':
						case 'Architecture':
						case 'Architectural History':
						case 'Landscape Architecture':
						case 'Art':
						case 'Astronomy':
						case 'Batten School':
						case 'Biology':
						case 'Biomedical Engineering':
						case 'Chemical Engineering':
						case 'Chemistry':
						case 'Civil Eng. and Applied Mathematics':
						case 'Civil and Environmental Engineering':
						case 'Commerce':
						case 'Computer Science':
						case 'Drama':
						case 'East Asian':
						case 'Economics':
						case 'Electrical and Computer Engineering':
						case 'Engineering':
						case 'Education':
						case 'English':
						case 'Environmental Sciences':
						case 'French':
						case 'German':
						case 'History':
						case 'Library':
						case 'Materials Science and Eng.':
						case 'Mathematics':
						case 'Mechanical and Aerospace Engineering':
						case 'Media Studies':
						case 'Middle Eastern and South Asian':
						case 'Music':
						case 'Philosophy':
						case 'Physics':
						case 'Politics':
						case 'Psychology':
						case 'Religious Studies':
						case 'Science, Technology and Society':
						case 'Slavic':
						case 'Sociology':
						case 'Spanish, Italian, and Portuguese':
						case 'Statistics':
						case 'Systems and Information Engineering':
						case 'Women, Gender, & Sexuality':
							if ($_POST['input_9'] == 'Book') {
								$notification['to'] .= ',lib-orders@virginia.edu';
								$notification['subject'] .= 'to Acquisitions';
							} else {
								$notification['subject'] .= 'to Subject Librarian';
							}
							break;
						default:
							$notification['subject'] .= 'to Acquisitions';
					}
				} else {
					$notification['to'] = 'lib-orders@virginia.edu';
					$notification['subject'] .= 'to Acquisitions';
				}
			}
		}
	}*/
	return $notification;
}

?>