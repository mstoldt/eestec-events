<?php
if(isset($_GET['id']))
{
	// Give me all the data at the moment and put it in the form
	$id = $_GET['id'];
	$this->db->where('id', $id); 
	$query = $this->db->get('lcs');
	$row = $query->row();
    
	$lc_city = $row->city;
	
}else{
	$lc_city = "";
}
$this->load->helper(array('form', 'url'));
// Open form and set URL for submit form
echo form_open('events/lcs_data_edited');

// Show City Field in View Page
echo form_label('City:', 'u_city');
	$data= array(
	'type' => 'text',
	'name' => 'u_city',
	'placeholder' => 'Please enter the name of the city',
	'class' => 'input_box',
	'value' => $lc_city
);
echo form_input($data);

?>


<?php
$data = array(
'type' => 'submit',
'value'=> 'Submit',
'class'=> 'submit'
);
echo form_submit($data); ?>


<?php echo form_close();?>


<?php if(isset($lc_city)){
	$data = array(
	'city' => $lc_city
	);
	$this->db->where('city', $lc_city);
	$this->db->update('lcs', $data);
} ?>

