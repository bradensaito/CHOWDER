<?php

include_once 'testLogin.php';

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