<table border="1" class="striped">
    <thead>
        <tr>
            <th>Choice</th>
            <th>Name</th>
            <th>EESTEC Link</th>
            <th>LC</th>
            <th>Events attended since 01/02</th>
        </tr>
    </thead>
    <tbody>
<?php
	$this->load->helper(array('form', 'url'));
	// Open form and set URL for submit form
	echo form_open('events/persons_data_submitted');


    $tmp = "";
    foreach ($list->result() as $row)
    {
        $eestec_profile_link = $row->eestec_profile_link;
        $p_name = $row->person_name;
        $e_name = $row->event_name;

        if($eestec_profile_link == $tmp)
        {
            echo ", ".$e_name;
        }
        else
        {
			
            echo "</td></tr><tr><td>";
			
			echo form_checkbox('choice', 'accept', TRUE);
			
            echo "</td><td>";
            echo $p_name;
            echo "</td><td><a href='".$eestec_profile_link."' target='_blank'>".$eestec_profile_link."</a>";
            echo "</td><td>".$row->city;
            echo "</td><td>".$e_name;
            $tmp = $eestec_profile_link;
        }

    }
 ?>

	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">

		<a class="btn-floating btn-large red" href="persons_form">
		  <i class="large material-icons">add</i>
		</a>

	</div>
</tbody>
</table>
<?php
	
	$data = array(
	'type' => 'submit',
	'value'=> 'Submit',
	'class'=> 'submit'
	);
	echo form_submit($data); 
	echo form_close();

?>