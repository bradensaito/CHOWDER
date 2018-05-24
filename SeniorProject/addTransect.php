<?php

include_once 'testLogin.php';

$dig = mysqli_real_escape_string($mysqli, $_POST['dig']);
$latitude = mysqli_real_escape_string($mysqli, $_POST['latitude']);
$longitude = mysqli_real_escape_string($mysqli, $_POST['longitude']);

$query = $mysqli->query("SELECT * FROM transects");
$rowCount = $query->num_rows;
$rowCount++;

$in = "INSERT INTO transects (id, dig_id, group_id, starttime, endtime, startlat, endlat, startlong, endlong) VALUES ('$rowCount', '$dig', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$latitude', NULL, '$longitude', NULL);";

mysqli_query($mysqli, $in);

$traversedthetransect = "Added Transect!";

echo "<script type='text/javascript'>\n";
echo "alert('$traversedthetransect');\n";
echo "window.location=('SPPage1.php');\n";
echo "</script>";

exit();


?>