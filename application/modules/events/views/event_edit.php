<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepicker4" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepicker5" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
</head>

<?php
if(isset($_GET['id']))
{
	// Give me all the data at the moment and put it in the form
	$id = $_GET['id'];
	$this->db->where('id', $id);
	$query = $this->db->get('events');
	$row = $query->row();

	$ev_name_id = $row->name;
	$ev_lc_id = $row->lc;
	$ev_start_date_id = $row->start_date;
	$ev_end_date_id = $row->end_date;
	$ev_description_id = $row->description;
	$ev_announce_date_id = $row->announce_date;
	$ev_deadline_date_id = $row->deadline_date;
	$ev_participants_announce_date_id = $row->participants_announce_date;

}else{
	$id = "";
	$ev_name_id= "";
	$ev_lc_id= "";
	$ev_start_date_id= "";
	$ev_end_date_id= "";
	$ev_description_id= "";
	$ev_announce_date_id= "";
	$ev_deadline_date_id= "";
	$ev_participants_announce_date_id= "";
}
?>


<script>
    $('.chip i').on('click', function(e) {
        var p_id = $(this).parents('div.chip').attr('data-person-id');
        var e_id = $(this).parents('div.chip').attr('data-event-id');

        $.post("events/delete_person_from_event", {p_id: p_id, e_id: e_id}, function(data)
        {

        });
    });

    $('#add-person-to-event').on('click', function(e) {
        var p_id = $('select#person-list').find(":selected").val();
        var p_name = $('select#person-list').find(":selected").text();
        var e_id = $('select#person-list').attr('data-event-id');

        $.post("events/add_person_to_event", {p_id: p_id, e_id: e_id}, function(data)
        {
            if(data)
            {
                $('.all-the-attending-persons').append('<div class="chip" data-person-id="'+p_id+'" data-event-id="'+e_id+'">'+p_name+'<i class="material-icons">close</i></div>');
            }
        });
    });
    <?php

    $datediff1 = $ev_end_date - $ev_start_date;
    $more_or_equal_seven = floor($datediff1/(60*60*24));

    $datediff2 = $ev_start_date - $ev_participants_announce_date;
    $more_or_equal_twentyeight = floor($datediff2/(60*60*24));

    $datediff3 = $ev_start_date - $ev_announce_date;
    $more_or_equal_fiftysix = floor($datediff3/(60*60*24));
    ?>
</script>

<?php
$this->load->helper(array('form', 'url'));
// Open form and set URL for submit form
echo form_open('events/data_edited');

// Show name Field in View Page
echo form_label('Event name:', 'ev_name');
$data= array(
'type' => 'text',
'name' => 'ev_name',
'placeholder' => 'Please Enter the name of the event',
'class' => 'input',
'value' => $ev_name_id
);
echo form_input($data);

// Show lc Field in View Page
echo form_label('Event lc:', 'ev_lc');
$data= array(
'type' => 'text',
'name' => 'ev_lc',
'placeholder' => 'Please Enter lc name',
'class' => 'input_box',
'value' => $ev_lc_id
);
echo form_input($data);

// Show start date Field in View Page
	if($more_or_equal_seven < 7 || $more_or_equal_twentyeight < 28 || $more_or_equal_fiftysix < 56){
		$classname = 'red input';
	}else{
		$classname = 'input';
	}
echo form_label('Event start date:', 'ev_start_date');
$data= array(
'type' => 'text',
'name' => 'ev_start_date',
'placeholder' => 'Please Enter the start date of the event',
'class' => $classname,
'id' => 'datepicker',
'value' => $ev_start_date_id
);
echo form_input($data);

// Show end date Field in View Page
if($more_or_equal_seven < 7){
		$classname = 'red input';
	}else{
		$classname = 'input';
	}
echo form_label('Event end date:', 'ev_end_date');
$data= array(
'type' => 'text',
'name' => 'ev_end_date',
'placeholder' => 'Please Enter the end date of the event',
'class' => $classname,
'id' => 'datepicker2',
'value' => $ev_end_date_id
);
echo form_input($data);

// Show description Field in View Page
echo form_label('Event description:', 'ev_description');
$data= array(
'type' => 'text',
'name' => 'ev_description',
'placeholder' => 'Please Enter the events description',
'class' => 'input_box',
'value' => $ev_description_id
);
echo form_input($data);

// Show announce date Field in View Page
	if($more_or_equal_fiftysix < 56){
		$classname = 'red input';
	}else{
		$classname = 'input';
	}
echo form_label('Event announce date:', 'ev_announce_date');
$data= array(
'type' => 'text',
'name' => 'ev_announce_date',
'placeholder' => 'Please Enter the announce date of the event',
'class' => $classname,
'id' => 'datepicker3',
'value' => $ev_announce_date_id
);
echo form_input($data);

// Show deadline Field in View Page
echo form_label('Event deadline date:', 'ev_deadline_date');
$data= array(
'type' => 'text',
'name' => 'ev_deadline_date',
'placeholder' => 'Please Enter deadline date Address',
'class' => 'input',
'id' => 'datepicker4',
'value' => $ev_deadline_date_id
);
echo form_input($data);

// Show participants announce date Field in View Page
if($more_or_equal_twentyeight < 28){
		$classname = 'red input';
	}else{
		$classname = 'input';
	}
echo form_label('Event participants announce date:', 'ev_participants_announce_date');
$data= array(
'type' => 'text',
'name' => 'ev_participants_announce_date',
'placeholder' => 'Please Enter the participants announce date for the event',
'class' => $classname,
'id' => 'datepicker5',
'value' => $ev_participants_announce_date_id
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

<select class="browser-default" id="person-list" data-event-id="<?php echo $id; ?>">
    <?php
        $query = $this->db->query("SELECT name, id FROM persons ORDER BY name ASC");
        foreach($query->result() as $row)
        {
            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
    ?>
</select>
<input type="button" value="Add to event" id="add-person-to-event">
<?php
if(isset($_GET['id'])){
?>
<div class="all-the-attending-persons">
<?php
    // Persons attending to this event
    $query = $this->db->query("SELECT p.name AS name, p.id AS id FROM event_participants ep INNER JOIN persons p ON ep.person_id = p.id WHERE event_id = ".$id);
    foreach($query->result() as $row)
    {
        echo '<div class="chip" data-person-id="'.$row->id.'" data-event-id="'.$id.'">'.$row->name.'<i class="material-icons">close</i></div>';
    }
?>
</div>


<?php
}
 echo form_close();?>


<?php if(isset($event_name_id) && isset($event_lc_id) && isset($event_start_date_id) && isset($event_end_date_id)){
	$data = array(
	'name' => $event_name_id,
	'lc' => $event_lc_id,
	'start_date' => $event_start_date_id,
	'end_date' => $event_end_date_id,
	'description' => $event_description_id,
	'announce_date' => $event_announce_date_id,
	'deadline_date' => $event_deadline_date_id,
	'participants_announce_date' => $event_participants_announce_date_id
	);
	$this->db->where('id', $ev_id);
	$this->db->update('events', $data);
} ?>


