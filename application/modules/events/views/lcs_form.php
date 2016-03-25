<?php

$this->load->helper(array('form', 'url'));
// Open form and set URL for submit form
echo form_open('events/lc_data_submitted');

// Show City Field in View Page
echo form_label('City:', 'u_city');
	$data= array(
	'type' => 'text',
	'name' => 'u_city',
	'placeholder' => 'Please enter the name of the city',
	'class' => 'input_box'
	);
	echo form_input($data);
?>

<div id="form_button">
<?php
	$data = array(
		'type' => 'submit',
		'value'=> 'Submit',
		'class'=> 'submit'
		);
		echo form_submit($data); ?>
	</div>


<?php echo form_close();?>


<?php if(isset($city)){
	$data = array(
	'city' => $city
	);
	$this->db->insert('lcs', $data);
} ?>
</div>
</div>
