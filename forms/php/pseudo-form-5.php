<?php
// This file contains the pseudo-code of the Fix & Flip form.


create_step(1, '
<label>For which of the following will the loan be used?</label>
<div>
	<select id="pseudo_input_1" name="pseudo_input_1">
		<option value="">PLEASE SELECT</option>
		<option value="Purchase">Purchase</option>
		<option value="Rehab">Rehab</option>
		<option value="Purchase and Rehab">Purchase &amp; Rehab</option>
		<option value="Construction">Construction</option>
		<option value="Refinance">Refinance</option>
		<option value="Other">Other</option>
	</select>
</div>
', 'first');

create_step(2, '
<label>What amount will be borrowed?</label>
<div>
	<select id="pseudo_input_2" name="pseudo_input_2">
		<option value="">PLEASE SELECT</option>
		<option value="Less than $100,000">Less than $100,000</option>
		<option value="$100,000&ndash;$199,000">$100,000&ndash;$199,000</option>
		<option value="$200,000&ndash;$299,000">$200,000&ndash;$299,000</option>
		<option value="$300,000&ndash;$399,000">$300,000&ndash;$399,000</option>
		<option value="$400,000&ndash;$499,000">$400,000&ndash;$499,000</option>
		<option value="$500,000&ndash;$599,000">$500,000&ndash;$599,000</option>
		<option value="$600,000&ndash;$699,000">$600,000&ndash;$699,000</option>
		<option value="$700,000&ndash;$799,000">$700,000&ndash;$799,000</option>
		<option value="$800,000&ndash;$899,000">$800,000&ndash;$899,000</option>
		<option value="$900,000&ndash;$999,000">$900,000&ndash;$999,000</option>
		<option value="More than $1,000,000">More than $1,000,000</option>
	</select>
</div>
', '');

create_step(3, '
<label>What type of property?</label>
<div>
	<select id="pseudo_input_3" name="pseudo_input_3">
		<option value="">PLEASE SELECT</option>
		<option value="Residential">Residential</option>
		<option value="Commercial">Commercial</option>
		<option value="Multi-family">Multi-family</option>
		<option value="Other">Other</option>
	</select>
</div>
', '');

create_step(4, '
<label>Property Occupancy:</label>
<p>'.theme_company_name().' does not finance owner-occupied properties.</p>
<div>
	<input type="checkbox" id="pseudo_input_14" name="pseudo_input_14" style="width: initial;"> This property is not owner-occupied.
</div>
', '', ''.theme_company_name().' does not finance owner-occupied properties.');

create_step(5, '
<label>What zip code is the property located?</label>
<div>
	<input type="text" id="pseudo_input_4" name="pseudo_input_4" />
</div>
', '', 'Please enter a valid zip code.');

create_step(6, '
<label>What is your preferred loan term?</label>
<div>
	<select id="pseudo_input_5" name="pseudo_input_5">
		<option value="">PLEASE SELECT</option>
		<option value="3 months">3 months</option>
		<option value="6 months">6 months</option>
		<option value="9 months">9 months</option>
		<option value="12 months">12 months</option>
	</select>
</div>
', '');

create_step(7, '
<label>Project Summary and Exit Strategy</label>
<div>
	<select id="pseudo_input_6" name="pseudo_input_6">
		<option value="">PLEASE SELECT</option>
		<option value="Sell property">Sell property</option>
		<option value="Pay with cash">Pay with cash</option>
		<option value="Refinance">Refinance</option>
	</select>
</div>
', '');

create_step(8, '
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

// This step "10" is needed. It's where the "hidden" Gravity Form lives.
create_step(10, $gravity_form, 'last', 'You must agree to receive communication from us.');