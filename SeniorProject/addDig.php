<?php

include_once "authenticate.php";

//Adds a new dig into the database according to data from the previous page
//Only level 3 and 4 users can schedule a dig
$date = mysqli_real_escape_string($mysqli, $_POST['date']);
$location = mysqli_real_escape_string($mysqli, $_POST['location']);

$query = $mysqli->query("SELECT * FROM digs");
$rowCount = $query->num_rows;
$rowCount++;

$in = "INSERT INTO digs (id, digdate, location) VALUES ('$rowCount', '$date', '$location');";

mysqli_query($mysqli, $in);

$digthedug = "Added Dig!";

echo "<script type= 'text/javascript'>\n";
echo "alert('$digthedug');\n";
echo "window.location=('SPPage1.php');\n";
echo "</script>";

exit();


?>
