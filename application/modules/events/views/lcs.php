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
</table>
