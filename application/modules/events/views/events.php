<?php
    if($_SESSION['role'] != 'admin')
    {
        redirect('events');
    }
?>
<table border="1" class="striped">
    <thead>
        <tr>
            <th>Event</th>
            <th>Attending people</th>
        </tr>
    </thead>
    <tbody>
<?php
    $tmp = "";
    foreach ($list->result() as $row)
    {
        $id = $row->id;
        $p_name = $row->person_name;
        $e_name = $row->event_name;

        if($row->id == $tmp)
        {
            echo "<br>".$p_name;
        }
        else
        {
            echo "</td></tr><tr><td>";
            echo $e_name;
            echo "</td><td>".$p_name;
            $tmp = $id;
        }

    }
 ?>

	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">

		<a class="btn-floating btn-large red" href="event_form">
		  <i class="large material-icons">add</i>
		</a>

	</div>


</table>
