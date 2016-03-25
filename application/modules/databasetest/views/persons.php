<table>
<?php
    foreach($list->result() as $row)
    {
        echo "<tr><td>";
        echo $row->name;
        echo "</td><td>";
        echo $row->city;
        echo "</td></tr>";
    }
?>
</table>
