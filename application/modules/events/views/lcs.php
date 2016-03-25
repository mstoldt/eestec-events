<?php
    if($_SESSION['role'] != 'admin')
    {
        redirect('events');
    }
?>
<table border="1">
<?php
    $tmp = "";
    foreach ($list->result() as $row)
    {
        $id = $row->id;
        $city = $row->city;
        $e_name = $row->event_name;

        if($row->id == $tmp)
        {
            echo "<br>".$e_name;
        }
        else
        {
            echo "</td></tr><tr><td>";
            echo $city;
            echo "</td><td>".$e_name;
            $tmp = $row->id;
        }

    }
 ?>
 
 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light red" href="lcs_form"><i class="material-icons">add</i></a>
 </div>
</table>
