<?php
// This file contains the pseudo-code of the Foreclosure Loans form.


create_step(1, '
<label>Which county auction will you be attending?</label>
<div>
	<input type="text" id="pseudo_input_1" name="pseudo_input_1" />
</div>
', 'first', 'Please tell us which county auction you will be attending.');

create_step(2, '
<label>Will you need money for a trustee foreclosure sale?</label>
<div>
	<select id="pseudo_input_2" name="pseudo_input_2">
		<option value="">PLEASE SELECT</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select>
</div>
', '');

create_step(3, '
<label>Please tell us which type of foreclosure.</label>
<div>
	<select id="pseudo_input_3" name="pseudo_input_3">
		<option value="">PLEASE SELECT</option>
		<option value="Trustee sale">Trustee sale</option>
		<option value="Sheriff sale">Sheriff sale</option>
		<option value="Other">Other</option>
	</select>
</div>
', '');

create_step(4, '
<label>Are you representing yourself or looking for representation?</label>
<div>
	<select id="pseudo_input_4" name="pseudo_input_4">
		<option value="">PLEASE SELECT</option>
		<option value="Will represent self">Will represent self</option>
		<option value="Looking for representation">Looking for representation</option>
	</select>
</div>
', '');

create_step(5, '
<label>How you will be using the funds?</label>
<div>
	<select id="pseudo_input_5" name="pseudo_input_5">
		<option value="">PLEASE SELECT</option>
		<option value="Purchase">Purchase</option>
		<option value="Purchase plus Rehab">Purchase + Rehab</option>
	</select>
</div>
', '');

create_step(6, '
<label>What amount of working capital do you have?</label>
<div>
	<select id="pseudo_input_6" name="pseudo_input_6">
		<option value="">PLEASE SELECT</option>
		<option value="less than $25,000">&lt; $25,000</option>
		<option value="$25,000&ndash;$49,000">$25,000&ndash;$49,000</option>
		<option value="$50,000&ndash;$99,000">$50,000&ndash;$99,000</option>
		<option value="greater than $100,000">&gt; $100,000</option>
	</select>
</div>
', '');

create_step(7, '
<label>Please provide your contact information</label>
<div class="table-like">
	<div><span>Name:</span><span><input id="pseudo_input_7" name="pseudo_input_7" class="half-input"> <input id="pseudo_input_8" name="pseudo_input_8" class="half-input"></span></div>
	<div><span>Email:</span><span><input id="pseudo_input_9" name="pseudo_input_9"></span></div>
	<div><span>Phone:</span><span><input id="pseudo_input_10" name="pseudo_input_10"></span></div>
</div>
', 'last', 'Please fill in all the fields.');








//////
// The final create_step() requires some extra work.

$form_id = get_post_meta(get_the_ID(), 'form_id', 'single');

$gravity_form = gravity_form(
	$form_id,
	$display_title = false,
	$display_description = false,
	$display_if_inactive = true,
	$dynamic_fields = array('landing_page', 'define_here'),
	$use_ajax = true,
	$tabindex = 0,
	$echo = false
);


create_step(10, $gravity_form, 'last', 'You must agree to receive communication from us.');