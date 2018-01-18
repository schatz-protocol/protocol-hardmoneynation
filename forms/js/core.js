//////
// JavaScript common to all multi-step forms.
//
// NOTE: make sure the array "form_validation_array" is defined,
//   otherwise, nothing will validate.
//


console.log('Hello. Since you\'re reading this, you must have your Inspector tool running.');
console.log('Yes, you will be seeing console messages on this page. No, I won\'t go into detail about them.');

// ---- User Interactions ---- //

function user_pressed_submit(id) {
	console.group('user_pressed_submit('+id+')');
	
	if (form_validation_array[id]()) {
		form_population_array[id]();
		jQuery('#pseudo_error_'+id).hide("fast");
		
		console.group('pseudo_press submit button');
		jQuery('#gform_submit_button_'+form_id).click();
	} else {
		jQuery('#pseudo_error_'+id).show("fast");
	}
	
	console.groupEnd();
}

function user_pressed_next(id) {
	console.group('user_pressed_next('+id+')');
	
	if (form_validation_array[id]()) {
		form_population_array[id]();
		jQuery('#pseudo_error_'+id).hide("fast");
		carousel_next();
	} else {
		jQuery('#pseudo_error_'+id).show("fast");
	}
	
	console.groupEnd();
}

// We don't use the ID. We ask to be consistent.
function user_pressed_back(id) {
	console.group('user_pressed_back('+id+')');
	
	carousel_previous();
	
	console.groupEnd();
}



// ---- Helpers for User Interactions ---- //

function getInvestmentCheckboxAsText(element_id) {
	return getPseudoCheckbox(element_id) ? "Investment Property" : "Primary Residence"
}

function populateGenuineForm(id) {
	var value = getPseudoField(id);
	console.log('setting field #' + id + ' as "' + value + '"');
	setGenuineField(id, value);
}

function populateGenuineFormAsInvestment(id) {
	var value = getInvestmentCheckboxAsText(id);
	console.log('setting field #' + id + ' as "' + value + '"');
	setGenuineField(id, value);
}

function getPseudoField(id) {
	return jQuery('#pseudo_input_'+id).val();
}

// All this function does is to get true/false
//   of the checkbox. Something else will need
//   to do something with this information.
function getPseudoCheckbox(id) {
	return jQuery('#pseudo_input_'+id).prop('checked');
}

function setGenuineField(id, value) {
	jQuery('#input_'+form_id+'_'+id).val(value);
}

function validatePseudoField(element_id, inputType) {
	console.group('validatePseudoField('+element_id+','+inputType+')');

	var result = true;
	if (!isOptionalField(element_id)) {
	
		if (inputType == 'investment') {
			// Convert the true/false into a string.
			var input = getInvestmentCheckboxAsText(element_id);
		} else {
			var input = myTrim(getPseudoField(element_id));
		}

		// Very simple validation is implemented. The intent is to filter out garbage
		//   such as "asdf", but not punish someone for putting parenthesis around
		//   their phone number (206) 555 1234.
		switch (inputType) {
			case "email":  result = basicEmailValidation(input); break;
			case "phone":  result = basicPhoneValidation(input); break;
			case "postal": result = basicPostalValidation(input); break;
			case "investment": result = investmentCheckboxValidation(input); break;
			default:       result = basicValidation(input);
		}
	}
	
	console.groupEnd();
	return result;
}

function isOptionalField(id) {
	// STUB -- if we need an optional field,
	//   it should be implemented here.
	return false;
}



// ---- Different kinds of validation ---- //

function basicValidation(input) {
	console.log('basic validation of ' + input);
	return (input != "");
}

// Based loosely on http://stackoverflow.com/a/9204568
function basicEmailValidation(input) {
	console.log('email validation of ' + input);
	var re = /^\s*\S+@\S+\.\S+\s*$/;
	return re.test(input);
}

// Wrote this from scratch.
function basicPhoneValidation(input) {
	console.log('phone validation of ' + input);
	var re = /\d\d\d.*\d\d\d.*\d\d\d\d/;
	return re.test(input);
}

// Wrote this from scratch.
// Won't work with Canadian postal codes.
function basicPostalValidation(input) {
	console.log('postal code validation of ' + input);
	var re = /^\s*\d\d\d\d\d\b/;
	return re.test(input);
}

function investmentCheckboxValidation(input) {
	console.log('investment checkbox validation of ' + input);
	var re = /^Investment Property$/;
	return re.test(input);
}



// ---- Miscellaneous ---- //

// http://www.w3schools.com/jsref/jsref_trim_string.asp
function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
