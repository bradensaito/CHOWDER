<?php

include_once "authenticate.php";

//Inserts a new clam into the database using the information provided from the main page
$dig = mysqli_real_escape_string($mysqli, $_POST['dig']);
$transect = mysqli_real_escape_string($mysqli, $_POST['transect']);
$section = mysqli_real_escape_string($mysqli, $_POST['section']);
$size = mysqli_real_escape_string($mysqli, $_POST['size']);

$in = "INSERT INTO clams (section, transect_id, size) VALUES ('$section', '$transect', '$size');";

mysqli_query($mysqli, $in);

$committheclam = "Recorded Clam!";

echo "<script type= 'text/javascript'>\n";
echo "alert('$committheclam');\n";
echo "window.location=('SPPage1.php');\n";
echo "</script>";

exit();

?>
