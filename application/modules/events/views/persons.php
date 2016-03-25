<input type="text" placeholder="Search..." id="search" style="width: 100%; height: 40px; border: 1px">
<table border="1" class="striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>EESTEC Email</th>
            <th>LC</th>
            <th>Events attended (since 01/02 are red)</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
<?php

    foreach ($list->result() as $row)
    {
        $id = $row->id;
        $eestec_email = $row->eestec_email;
        $name = $row->person_name;
        $city = $row->city;

        echo "<tr class='searchme'>";

        echo "<td class='searchname'>".$name."</td>";

        echo "<td class='searchlink'><a href='".$eestec_email."' target='_blank'>".$eestec_email."</a></td>";

        echo "<td>".$city."</td>";

        echo "<td>";

        $id = intval($id);
        $date = date("Y")."-02-01";

        $query = $this->db->query('SELECT e.name AS event_name, e.start_date FROM event_participants ep INNER JOIN events e ON ep.event_id = e.id WHERE ep.person_id = '.$id.' ORDER BY start_date DESC');

        foreach ($query->result() as $event)
        {
            if($event->start_date > $date)
            {
                echo "<span class='red'>";
            }

            echo $event->event_name.", ";

            if($event->start_date > $date)
            {
                echo "</span>";
            }
        }
        echo "</td>";

        echo "<td><a href='persons_edit?id=".$row->id."'><i class='material-icons'>mode edit</i></a></td>";

        echo "</tr>";
    }
 ?>

	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">

		<a class="btn-floating btn-large red" href="persons_form">
		  <i class="large material-icons">add</i>
		</a>

	</div>
</tbody>
</table>


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
