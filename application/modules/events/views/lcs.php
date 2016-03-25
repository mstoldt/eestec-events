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
            echo "</td></tr><tr class='searchme'><td class='searchme'>";
            echo $city;
            echo "</td><td>".$e_name." (".$row->event_startdate." - ".$row->event_enddate.")";
            $tmp = $row->id;
        }

    }
 ?></tbody>
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
