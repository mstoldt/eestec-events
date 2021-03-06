<?php
$this->load->helper(array('form', 'url'));
// Open form and set URL for submit form
echo form_open('events/persons_data_submitted');

// Show name Field in View Page
echo form_label('Name:', 'per_name');
$data= array(
'type' => 'text',
'name' => 'per_name',
'placeholder' => 'Please Enter the participant name',
'class' => 'input'
);
echo form_input($data);

// Show profile Field in View Page
echo form_label('EESTEC profile link:', 'prof_link');
$data= array(
'type' => 'text',
'name' => 'prof_link',
'placeholder' => 'Please Enter EESTEC profile link',
'class' => 'input_box'
);
echo form_input($data);

// Show lc Field in View Page
$query = $this->db->query("SELECT city, id FROM lcs");

echo form_label('LC:', 'per_lc');
echo "<select class='browser-default' name='per_lc'>";
echo "<option disabled selected>Choose your option</option>";
    
foreach($query->result() as $row)
{
	echo "<option value='".$row->id."'>".$row->city."</option>";
}
echo "</select>";

?>


<?php
$data = array(
'type' => 'submit',
'value'=> 'Submit',
'class'=> 'submit'
);
echo form_submit($data); ?>


<?php echo form_close();?>


<?php if(isset($person_name_id) && isset($profile_link_id) && isset($lc_id)){
	$data = array(
	'name' => $person_name_id,
	'eestec_email' => $profile_link_id,
	'lc' => $lc_id
	);
	$this->db->insert('persons', $data);
} ?>
