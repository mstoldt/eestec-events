<table border="1">
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
</table>
