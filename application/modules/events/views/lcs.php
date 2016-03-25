<?php
    if($_SESSION['role'] != 'admin')
    {
        redirect('events');
    }
?>
<table class="striped">
    <thead>
        <tr>
            <th>City</th>
            <th>Events in the last 4 years</th>
        </tr>
    </thead>
    <tbody>
<?php
    $tmp = "";
    foreach ($list->result() as $row)
    {
        $id = $row->id;
        $city = $row->city;
        $e_name = $row->event_name;

        if($row->id == $tmp)
        {
            echo "<br>".$e_name." (".$row->event_startdate." - ".$row->event_enddate.")";
        }
        else
        {
            echo "</td></tr><tr><td>";
            echo $city;
            echo "</td><td>".$e_name." (".$row->event_startdate." - ".$row->event_enddate.")";
            $tmp = $row->id;
        }

    }
<<<<<<< HEAD
 ?></tbody>
=======
 ?>
 
 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light red" href="lcs_form"><i class="material-icons">add</i></a>
 </div>
>>>>>>> origin/master
</table>
