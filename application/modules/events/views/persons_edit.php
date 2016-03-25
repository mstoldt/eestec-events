<?php
if(isset($_GET['id']))
{
	// Give me all the data at the moment and put it in the form
	$id = $_GET['id'];
	$this->db->where('id', $id); 
	$query = $this->db->get('persons');
	$row = $query->row();
    
	$p_name = $row->name;
	$prof_link = $row->eestec_email;
	$p_lc = $row->lc;
	
}else{
	$p_name = "";
	$prof_link = "";
	$p_lc = "";
	$id="";
}
$this->load->helper(array('form', 'url'));
// Open form and set URL for submit form
echo form_open('events/persons_data_edited');

// Show name Field in View Page
echo form_label('Name:', 'per_name');
$data= array(
'type' => 'text',
'name' => 'per_name',
'placeholder' => 'Please Enter the participant name',
'class' => 'input',
'value' => $p_name
);
echo form_input($data);

// Show profile Field in View Page
echo form_label('EESTEC profile link:', 'prof_link');
$data= array(
'type' => 'text',
'name' => 'prof_link',
'placeholder' => 'Please Enter EESTEC profile link',
'class' => 'input_box',
'value' => $prof_link
);
echo form_input($data);

// Show lc Field in View Page
echo form_label('LC:', 'per_lc');
$data= array(
'type' => 'text',
'name' => 'per_lc',
'placeholder' => 'Please Enter the LC',
'class' => 'datepicker',
'value' => $p_lc
);
echo form_input($data);


echo form_hidden('id', $id);

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
	$this->db->where('id', $p_id);
	$this->db->update('persons', $data);
	
	redirect("events/persons");
} ?>

