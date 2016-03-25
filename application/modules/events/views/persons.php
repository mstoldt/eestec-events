<table border="1">
<?php
    $tmp = "";
    foreach ($list->result() as $row)
    {
        $eestec_profile_link = $row->eestec_profile_link;
        $p_name = $row->person_name;
        $e_name = $row->event_name;

        if($eestec_profile_link == $tmp)
        {
            echo "<br>".$e_name;
        }
        else
        {
            echo "</td></tr><tr><td>";
            echo $p_name;
            echo "</td><td><a href='".$eestec_profile_link."' target='_blank'>".$eestec_profile_link."</a>";
            echo "</td><td>".$e_name;
            $tmp = $eestec_profile_link;
        }

    }
 ?>
</table>
