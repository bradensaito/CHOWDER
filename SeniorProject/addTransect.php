<?php

include_once "authenticate.php";

//Starts a transect in the database from the location data and the dig gathered on the previous //page
    
$dig = mysqli_real_escape_string($mysqli, $_POST['dig']);
$latitude = mysqli_real_escape_string($mysqli, $_POST['curLat']);
$longitude = mysqli_real_escape_string($mysqli, $_POST['curLong']);
    $orientation = "NOT_SET";
    if($_POST['orientation'] == 'Yes') {
        $orientation = "bottom_to_top";
    }
    else {
        $orientation = "top_to_bottom";
    }
    
$query = $mysqli->query("SELECT * FROM transects");
$rowCount = $query->num_rows;
$rowCount++;

$in = "INSERT INTO transects (id, dig_id, group_id, starttime, endtime, startlat, endlat, startlong, endlong, orientation) VALUES ('$rowCount', '$dig', '1', CURRENT_TIMESTAMP, NULL, '$latitude', NULL, '$longitude', NULL, '$orientation');";

mysqli_query($mysqli, $in);

$traversedthetransect = "Added Transect!";

echo "<script type='text/javascript'>\n";
echo "alert('$traversedthetransect');\n";
    switch ($_SESSION["permissions"]) {
        case 1:
            echo "window.location=('SPLevel1.php');\n";
            break;
        case 2:
            echo "window.location=('SPLevel2.php');\n";
            break;
        case 3:
            echo "window.location=('SPLevel3.php');\n";
            break;
        case 4:
            echo "window.location=('SPPage1.php');\n";
            break;
    }
echo "</script>";

exit();


?>
