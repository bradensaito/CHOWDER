<?php

include_once 'testLogin.php';

$dig = mysqli_real_escape_string($mysqli, $_POST['section']);

$query = $mysqli->query("SELECT * FROM sections");
$rowCount = $query->num_rows;
$rowCount++;

$in = "INSERT INTO sections (id, transect_id) VALUES ('$rowCount', '$dig', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$latitude', NULL, '$longitude', NULL);";

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