<?php
    if($_SESSION['role'] != 'admin')
    {
        redirect('events');
    }
?>
<input type="text" placeholder="Search..." id="search" style="width: 100%; height: 40px; border: 1px">
<table class="striped">
    <thead>
        <tr>
            <th>City</th>
            <th>Events in the last 4 years</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($list->result() as $row)
    {
        $id = $row->id;
        $city = $row->city;

        echo "<tr class='searchme'>";

        echo "<td class='searchme'>";
        echo $city;
        echo "</td>";

        // Events
        echo "<td>";

        $id = intval($id);
        $query = $this->db->query('SELECT e.name AS event_name, e.start_date FROM events e WHERE lc = '.$id.' ORDER BY start_date DESC');

        foreach ($query->result() as $event)
        {
            echo $event->event_name.", ";
        }

        echo "</td>";

        echo "<td><a href='lcs_edit?id=".$row->id."'><i class='material-icons'>mode edit</i></a></td>";

        echo "</tr>";

    }
 ?>
</tbody>
</table>
 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
  <a class="btn-floating btn-large waves-effect waves-light red" href="lcs_form"><i class="material-icons">add</i></a>
 </div>
 <script>
     $("#search").on("keyup change", function(e) {
         // Set Search String
         var search_string = $(this).val().toLowerCase();

         // Do Search
         if(search_string !== '')
         {
             $('tr.searchme').each(function() {
                 var city = $(this).children('td.searchme').html().toLowerCase();
                 if(city.indexOf(search_string) == -1)
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
