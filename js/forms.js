// Customization for AJAX using Gravity Forms.
var ldapSearchURL = location.protocol+'//'+document.domain+'/find_uva_person/ldap.php';

// Retrieve employee information from the staff.json file and update form field values to 
function getExistingStaffDirectoryValues(empEmail,officialName,preferredName,nametagName,phone,title,
	team,officeLocation,address,jobSummary,professionalProfile) {
	$.getJSON('//static.lib.virginia.edu/directory/_data/staff.json', function(staffDir) {
		// Initialize employee data record as if employee is new/not found.
		var empData = {
			'uid':'', 
			'teams':[''], 
			'libraries':[''], 
			'displayName':'', 
			'nickName':'', 
			'firstName':'', 
			'middleName':'', 
			'lastName':'', 
			'title':'', 
			'email':'', 
			'phone':'', 
			'library':'', 
			'officeLocation':'', 
			'address':'', 
			'jobsummary':'', 
			'professionalprofile':''
		};
		// get the employee's record by searching for the matching email address
		for (var compId in staffDir) {
			if (staffDir[compId].email == jQuery(empEmail).val()) {
				empData = staffDir[compId];
				break;
			}
		}
		// Update form field values if the person was found.
		if (empData.email == jQuery(empEmail).val()) {
			jQuery(officialName).attr('value', empData.lastName+', '+empData.firstName+' '+empData.middleName);
			jQuery(preferredName).attr('value', empData.nickName);
			jQuery(nametagName).attr('value', empData.displayName);
			jQuery(phone).attr('value', empData.phone);
			jQuery(title).attr('value', empData.title);
			jQuery(team).attr('value', empData.team[0]);
			jQuery(officeLocation).attr('value', empData.officeLocation);
			if (jQuery(address+"[type=radio][value='"+empData.address+"']")) {
				jQuery(address+"[type=radio][value='"+empData.address+"']").prop('checked', true);
			} else {
				jQuery(address+'[type=text]').attr('value', empData.address);
			}
			jQuery(jobSummary).attr('value', empData.jobsummary);
			jQuery(professionalProfile).attr('value', empData.professionalprofile);
		}
	});
}

// Loop through the department form field selection options to determine 
// if one might match what was retrieved from LDAP
function updateDepartmentSelection(department, other_department, 
    ldapValue) {
  // Throw away words that won't match our department list...
  // school of , dept of, graduate, visiting, 'vp for'
  var dept = ldapValue.replace('School of','');
  dept = dept.replace('Department of','');
  dept = dept.replace('Department for','');
  dept = dept.replace('University of Virginia','');
  dept = dept.replace('VP for','');
  dept = dept.replace('Graduate','');
  dept = dept.replace('Undergraduate','');
  dept = dept.replace('Language and Literatures','');
  dept = dept.replace('Languages and Literatures','');
  dept = dept.replace('Languages and Cultures','');
  dept = dept.replace('Visiting','');
  // Split department up into parts. NOTE: If no hyphen then result 
  // is first array element contains what the string was before trying 
  // to split.
  var deptArray = dept.split('-');
  // Go through the department strings left in the array and see if 
  // they match without splitting the words apart.
  var found = '';
  var i = 0;
  while (i < deptArray.length) {
    for (j = 0; j < jQuery(department+" option").size(); j++) {
      if (jQuery(department+" option").eq(j).text() == jQuery.trim(deptArray[i])) {
        found = jQuery(department+" option").eq(j).val();
        i = deptArray.length;	// something matched; exit loop
        break;	// stop executing the for loop
      }
    }
    i = i + 1;
  }
  // If a match was found then make it the selected option
  if (found != '') {
    jQuery(department).val(found);
    jQuery(other_department).val('');
  } else {
    // If the department was not found, then we want to select the 
    // other department value and put the LDAP department info into a 
    // text field and display it on the screen.
    jQuery(department).val("Other...").attr("selected", true);
    jQuery(other_department).val(dept);
  }
}

// When the UVA computing id field is updated on the form, proceed to 
// auto-fill information about the user into the appropriate fields.
function uvaComputingIdChanged(computing_id, name, email, phone, affiliation, 
    department, other_department) {
  jQuery.getJSON(ldapSearchURL+"?user="+jQuery(computing_id).val(), function(data) {
    // identify the user affiliation
    var userStatus = new String(data.affiliation);
    // user was found so prefill the name and email form field values
    // choose the appropriate affiliation
    if (data.nickname == '') {
      jQuery(name).attr('value',data.firstName+' '+data.lastName);
    } else {
      jQuery(name).attr('value',data.nickname+' '+data.lastName);
    }
    jQuery(email).attr('value',data.email);
    if (jQuery(phone).length) {
      jQuery(phone).attr('value',data.phone);
    }
    // update the affiliation selection list to reflect the person's
    // first unselect all the options... then select based on affiliation
    jQuery(affiliation).find("option").attr("selected", false);
    if (userStatus.search(/faculty/i) >= 0) {
      jQuery(affiliation+" option:contains('Faculty')").attr("selected", true);
    } else if (userStatus.search(/undergraduate/i) >= 0) {
      jQuery(affiliation+" option:contains('Undergraduate')").attr("selected", true);
    } else if (userStatus.search(/graduate/i) >= 0) {
      jQuery(affiliation+" option:contains('Graduate')").attr("selected", true);
    } else if (userStatus.search(/staff/i) >= 0) {
      jQuery(affiliation+" option:contains('Staff')").attr("selected", true);
    } else {
      jQuery(affiliation+" option:contains('Affiliation')").attr("selected", true);
    }
    // Update the department value based on what the person's LDAP result is
    if (jQuery(department).length) {
      updateDepartmentSelection(department, other_department, new String(data.department));
    }
  });
}

// When the UVA student computing id field is updated on the form, proceed to 
// auto-fill information about the student into the appropriate fields.
function uvaStudentComputingIdChanged(computing_id, fname, nname, lname, email, phone, affiliation, 
    department, other_department) {
  $.getJSON(ldapSearchURL+"?user="+jQuery(computing_id).val(), function(data) {
    // identify the user affiliation
    var userStatus = new String(data.affiliation);
    // user was found so prefill the name and email form field values
    jQuery(fname).attr('value',data.firstName);
    jQuery(lname).attr('value',data.lastName);
    jQuery(nname).attr('value',data.nickname);
    jQuery(email).attr('value',data.email);
    if (jQuery(phone).length) {
      jQuery(phone).attr('value',data.phone);
    }
    // update the affiliation selection list to reflect the person's
    // first unselect all the options... then select based on affiliation
    jQuery(affiliation).find("option").attr("selected", false);
    if (userStatus.search(/faculty/i) >= 0) {
      jQuery(affiliation+" option:contains('Faculty')").attr("selected", true);
    } else if (userStatus.search(/undergraduate/i) >= 0) {
      jQuery(affiliation+" option:contains('Undergraduate')").attr("selected", true);
    } else if (userStatus.search(/graduate/i) >= 0) {
      jQuery(affiliation+" option:contains('Graduate')").attr("selected", true);
    } else if (userStatus.search(/staff/i) >= 0) {
      jQuery(affiliation+" option:contains('Staff')").attr("selected", true);
    } else {
      jQuery(affiliation+" option:contains('Affiliation')").attr("selected", true);
    }
    // Update the department value based on what the person's LDAP result is
    if (jQuery(department).length) {
      updateDepartmentSelection(department, other_department, new String(data.department));
    }
  });
}
