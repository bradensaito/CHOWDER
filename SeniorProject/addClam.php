<?php

include_once "authenticate.php";

//Inserts a new clam into the database using the information provided from the main page
$dig = mysqli_real_escape_string($mysqli, $_POST['dig']);
$transect = mysqli_real_escape_string($mysqli, $_POST['transect']);
$section = mysqli_real_escape_string($mysqli, $_POST['section']);
$size = mysqli_real_escape_string($mysqli, $_POST['size']);

$query = $mysqli->query("SELECT id FROM clams");
$rowCount = $query->num_rows;
$rowCount++;
$id = $_SESSION['id'];
    
    print($id);
$in = "INSERT INTO clams (id, section_id, transect_id, account_id, size) VALUES ('$rowCount', '$section', '$transect', '$id', '$size');";

mysqli_query($mysqli, $in);

$committheclam = "Recorded Clam!";

echo "<script type= 'text/javascript'>\n";
echo "alert('$committheclam');\n";
echo "window.location=('SPPage1.php');\n";
echo "</script>";

exit();

?>
