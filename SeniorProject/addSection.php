<?php

include_once 'testLogin.php';

$transect = mysqli_real_escape_string($mysqli, $_POST['transect']);

$query = $mysqli->query("SELECT * FROM sections WHERE tr_id = " .$_POST['transect']);
$rowCount = $query->num_rows;
$rowCount++;

$in = "INSERT INTO sections (id, transect_id) VALUES ('$rowCount', '$transect');";

mysqli_query($mysqli, $in);

$savedSection = "Added Section!";

echo "
<script type='text/javascript'>
\n";
echo "alert('$savedSection');\n";
echo "window.location=('SPPage1.php');\n";
echo "</script>";

exit();


?>