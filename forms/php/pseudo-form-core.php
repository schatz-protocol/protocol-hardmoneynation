<?php

// This file contains all the logic common to each pseudo-form.
// The pseudo form doesn't care about whether it's within a carousel.

// Wrap some HTML in a container for the front page.
// * $step -- the step this form represents; does not necessarly mean ID of element.
// * $input -- the HTML used for the pseudo-form.
// * $type -- specify "first" or "last" to indicate the first or last step of the form.
// * $message -- something to say if the input is invalid.
function create_step($step, $input, $type = "", $message = 'Please select an option before continuing.') {

	$input_val = pseudo_build_input_val($step, $message);
	$buttons = pseudo_build_buttons($step, $type);
	
	// The "pseudo-step-container" is what the carousel handles.
	// The "pseudo-step" is what the user sees.
	$template = '
		<div class="pseudo-step-container">
			<div class="pseudo-step">
				<div class="pseudo-form">%s</div>
				<div class="input-val">%s</div>
				<div class="buttons">%s</div>
			</div>
		</div>
	';

	print sprintf($template, $input, $input_val, $buttons);
}

function pseudo_build_input_val($step, $message) {

	$result = '';
	
	$result .= sprintf('
<div id="pseudo_error_%d" class="error">
	<div class="error_message">%s</div>
</div>
', $step, $message);
	
	return $result;
}

function pseudo_build_buttons($step, $type) {

	$result = '';
	
	$result .= pseudo_build_previous_button($step, $type);
	$result .= pseudo_build_next_button($step, $type);
	
	// Wrap the $result in a DIV.
	if ($result) {
		$result = '<div class="button-container clearfix">'."\n".$result.'</div>'."\n";
	}
	
	return $result;

}

function pseudo_build_previous_button($step, $type) {

	$result = '';
	
	// We obviously don't want a Previous button for the first step.
	if ($type != 'first') {
		// We build two buttons, for RWD purposes.
		$result .= sprintf('<input type="button" class="previous_button larger" value="Previous" onclick="user_pressed_back(%d)" />', $step) . "\n";
		$result .= sprintf('<input type="button" class="previous_button smaller" value="&laquo;" onclick="user_pressed_back(%d)" />', $step) . "\n";
	}
	
	return $result;
}

function pseudo_build_next_button($step, $type) {

	$result = '';
	
	if ($type == 'last') {
		// Build a "submit" button instead.
		$result .= sprintf('<input type="button" class="submit_button protocol_money_background_alt_color" value="Submit" onclick="user_pressed_submit(%d)" />', $step) . "\n";
	} else {
	
		if ($type == 'first') {
			// Build a bigger "next" button.
			$result .= sprintf('<input type="button" class="next_button longer protocol_money_background_alt_color" value="Continue &gt;" onclick="user_pressed_next(%d)" class="" />', $step) . "\n";
		} else {
			// Build a regular-sized "next" button.
			$result .= sprintf('<input type="button" class="next_button protocol_money_background_alt_color" value="Continue &gt;" onclick="user_pressed_next(%d)" />', $step) . "\n";
		}
	}
	
	return $result;
}