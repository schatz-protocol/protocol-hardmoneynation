// We need to tell multi-step-core what form we're working with.
var form_id = 7;

//////
// Input Validation for Gravity Form #7. (Hard Money Loan Questions)
//

var form_validation_array = new Array();

form_validation_array[1] = function() {
	return validatePseudoField(element = 1, '');
};

form_validation_array[2] = function() {
	return validatePseudoField(element = 2, '');
};

form_validation_array[3] = function() {
	return validatePseudoField(element = 3, '');
};

form_validation_array[4] = function() {
	return validatePseudoField(element = 14, 'investment');
};

form_validation_array[5] = function() {
	return validatePseudoField(element = 4, 'postal');
};

form_validation_array[6] = function() {
	return validatePseudoField(element = 5, '');
};

form_validation_array[7] = function() {
	return validatePseudoField(element = 6, '');
};

// This step has multiple items to validate.
form_validation_array[8] = function() {
	var result = true;
	result &= validatePseudoField(element = 7, '');
	result &= validatePseudoField(element = 8, '');
	result &= validatePseudoField(element = 9, 'email');
	result &= validatePseudoField(element = 10, 'phone');
	return result;
};

var form_population_array = new Array();

form_population_array[1] = function() {
	populateGenuineForm(element = 1);
};

form_population_array[2] = function() {
	populateGenuineForm(element = 2);
};

form_population_array[3] = function() {
	populateGenuineForm(element = 3);
};

form_population_array[4] = function() {
	populateGenuineFormAsInvestment(element = 14);
};

form_population_array[5] = function() {
	populateGenuineForm(element = 4);
};

form_population_array[6] = function() {
	populateGenuineForm(element = 5);
};

form_population_array[7] = function() {
	populateGenuineForm(element = 6);
};

form_population_array[8] = function() {
	populateGenuineForm(element = 7);
	populateGenuineForm(element = 8);
	populateGenuineForm(element = 9);
	populateGenuineForm(element = 10);
}