<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker2" ).datepicker();
    $( "#datepicker3" ).datepicker();
    $( "#datepicker4" ).datepicker();
    $( "#datepicker5" ).datepicker();
  });
  </script>
</head>

<?php

$this->load->helper(array('form', 'url'));
// Open form and set URL for submit form
echo form_open('events/data_submitted');

// Show name Field in View Page
echo form_label('Event name:', 'ev_name');
$data= array(
'type' => 'text',
'name' => 'ev_name',
'placeholder' => 'Please Enter the name of the event',
'class' => 'input'
);
echo form_input($data);

// Show lc Field in View Page
echo form_label('Event lc:', 'ev_lc');
$data= array(
'type' => 'text',
'name' => 'ev_lc',
'placeholder' => 'Please Enter lc name',
'class' => 'input_box'
);
echo form_input($data);

// Show start date Field in View Page
echo form_label('Event start date:', 'ev_start_date');
$data= array(
'type' => 'text',
'name' => 'ev_start_date',
'placeholder' => 'Please Enter the start date of the event',
'class' => 'input',
'id' => 'datepicker'
);
echo form_input($data);

// Show end date Field in View Page
echo form_label('Event end date:', 'ev_end_date');
$data= array(
'type' => 'text',
'name' => 'ev_end_date',
'placeholder' => 'Please Enter the end date of the event',
'class' => 'input',
'id' => 'datepicker2'
);
echo form_input($data);

// Show description Field in View Page
echo form_label('Event description:', 'ev_description');
$data= array(
'type' => 'text',
'name' => 'ev_description',
'placeholder' => 'Please Enter the events description',
'class' => 'input_box'
);
echo form_input($data);

// Show announce date Field in View Page
echo form_label('Event announce date:', 'ev_announce_date');
$data= array(
'type' => 'text',
'name' => 'ev_announce_date',
'placeholder' => 'Please Enter the announce date of the event',
'class' => 'input',
'id' => 'datepicker3'
);
echo form_input($data);

// Show deadline Field in View Page
echo form_label('Event deadline date:', 'ev_deadline_date');
$data= array(
'type' => 'text',
'name' => 'ev_deadline_date',
'placeholder' => 'Please Enter deadline date Address',
'class' => 'input',
'id' => 'datepicker4'
);
echo form_input($data);

// Show participants announce date Field in View Page
echo form_label('Event participants announce date:', 'ev_participants_announce_date');
$data= array(
'type' => 'text',
'name' => 'ev_participants_announce_date',
'placeholder' => 'Please Enter the participants announce date for the event',
'class' => 'input',
'id' => 'datepicker5'
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


<?php if(isset($event_name_id) && isset($event_lc_id) && isset($event_start_date_id) && isset($event_end_date_id)){
	$data = array(
	'name' => $event_name_id,
	'lc' => $event_lc_id,
	'start_date' => $event_start_date_id,
	'end_date' => $event_end_date_id,
	'description' => $event_description_id,
	'announce_date' => $event_announce_date_id,
	'deadline_date' => $event_deadline_date_id,
	'participants_announce_date' => $event_participants_announce_date_id,
	);
	$this->db->insert('events', $data); 
} ?>

