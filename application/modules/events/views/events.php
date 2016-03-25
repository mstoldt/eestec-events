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
            <th>LC</th>
            <th>Attending people</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
<?php

    foreach ($list->result() as $row)
    {
        $id = $row->id;
        $e_name = $row->event_name;

        echo "<tr>";
        echo "<td>".$e_name."</td>";

        echo "<td>".$row->lc_city."</td>";

        echo "<td>";

        $id = intval($id);
        $query = $this->db->query('SELECT p.name AS name FROM event_participants ep INNER JOIN persons p ON ep.person_id = p.id WHERE event_id = '.$id);

        foreach ($query->result() as $event)
        {
            echo $event->name.", ";
        }

        echo "</td>";

        echo "<td><a href='event_edit?id=".$id."'><i class='material-icons'>mode edit</i></a></td>";

        echo "</tr>";


    }
 ?>

	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">

		<a class="btn-floating btn-large red" href="event_form">
		  <i class="large material-icons">add</i>
		</a>

	</div>


</table>
