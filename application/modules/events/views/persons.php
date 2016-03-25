<table border="1">
<?php
    $tmp = "";
    foreach ($list->result() as $row)
    {
        $p_name = $row->person_name;
        $e_name = $row->event_name;

        if($row->eestec_profile_link == $tmp)
        {
            echo "<br>".$e_name;
        }
        else
        {
            echo "</td></tr><tr><td>";
            echo $p_name;
            echo "</td><td>".$e_name;
            $tmp = $row->eestec_profile_link;
        }

    }
 ?>
</table>
