<?php
   include "authenticate.php";
   $permission_level = 4;
   permissionAuth($permission_level);
   
   $csv_filename = 'db'.date('Y-m-d').'.csv';
   $csv_data = '';
   
   $query = mysqli_query($mysqli, 'select accounts.id, accounts.firstname, accounts.lastname, accounts.username, digs.id, digs.digdate, digs.location, groups.id, transects.id, transects.starttime, transects.endtime, transects.startlat, transects.endlat, transects.startlong, transects.endlong, transects.orientation, sections.id, clams.id, clams.size from accounts join clams join digs join `groups` join sections join transects on `groups`.dig_id = digs.id and `groups`.account_id = accounts.id and transects.dig_id = digs.id and transects.group_id = `groups`.id and sections.transect_id = transects.id and clams.section_id = sections.id and clams.transect_id = transects.id and clams.account_id = accounts.id');
   
   $field = mysqli_num_fields($query);

   for ($i = 0; $i < $field; $i++) {
      $csv_data.= mysqli_fetch_field_direct($query, $i)->name.',';
   }
   $csv_data = substr($csv_data, 0, -1);
   $csv_data.= "\n";
   
   while ($row = mysqli_fetch_array($query)) {
      for ($i = 0; $i < $field; $i++) {
         $csv_data.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'",';
      }
      $csv_data = substr($csv_data, 0, -1);
      $csv_data.= "\n";
   }
   
   header("Content-type: text/x-csv");
   header("Content-Disposition: attachment; filename=".$csv_filename."");
   echo($csv_data);
?>
