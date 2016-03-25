<input type="text" placeholder="Search..." id="search" style="width: 100%; height: 40px; border: 1px">
<?php
	$this->load->helper(array('form', 'url'));
	// Open form and set URL for submit form
	echo form_open('events/persons_data_submitted');
     ?>
<table border="1" class="striped">
    <thead>
        <tr>
            <th>Edit</th>
            <th>Name</th>
            <th>EESTEC Link</th>
            <th>LC</th>
            <th>Events attended since 01/02</th>
        </tr>
    </thead>
    <tbody>
<?php


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


            echo "</td></tr>";
            echo "<tr class='searchme'><td>";
			//echo form_checkbox('choice', 'accept', TRUE);
			echo "<a href='persons_form?id=".$row->id."'>Edit</a>";
            echo "</td><td class='searchname'>";

            echo $p_name;
            echo "</td><td class='searchlink'><a href='".$eestec_profile_link."' target='_blank'>".$eestec_profile_link."</a></td>";
            echo "<td>".$row->city."</td>";
            echo "<td>".$e_name;
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
<pre><div id="output"></div></pre>

<script>
    $("#search").on("keyup change", function(e) {
        // Set Search String
        var search_string = $(this).val().toLowerCase();

        // Do Search
        if(search_string !== '')
        {
            $('tr.searchme').each(function() {
                var name = $(this).children('.searchname').html().toLowerCase();
                var link = $(this).children('.searchlink').html().toLowerCase();
                if(name.indexOf(search_string) == -1 && link.indexOf(search_string) == -1)
                {
                    $(this).hide();
                }
            });
        }
        else
        {
            $('tr.searchme').show();
        }
    });
</script>
