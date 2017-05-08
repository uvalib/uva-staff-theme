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
        '$value = (isset($_SERVER["REMOTE_USER"])) ? $_SERVER["REMOTE_USER"] : populate_usermeta(\'user_login\'); 
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

// Staff Purchase Request form: adjust the notification based on rush or not
// Test server form ID=25
// Prod server form ID=33
add_filter('gform_notification_33', 'gf_change_purchase_request_notification_email', 10, 2);
function gf_change_purchase_request_notification_email($notification, $form, $entry){
	// Check to see if this purchase is rush or not to adjust the subject line.
	if (isset($_POST['input_60']) and ($_POST['input_60'] == 'Yes')) {
		$subject = $notification['subject'];
		$notification['subject'] = 'Rush: ' . $subject;
	}
	return $notification;
}

?>