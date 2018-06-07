<?php

include_once "authenticate.php";

//Adds a section to the transect based on information gathered from the previous page
    
$transect = mysqli_real_escape_string($mysqli, $_POST['transect']);

$query = $mysqli->query("SELECT * FROM sections WHERE transect_id = " .$_POST['transect']);
$rowCount = $query->num_rows;
$rowCount++;


$in = "INSERT INTO sections (id, transect_id) VALUES ('$rowCount', '$transect');";

mysqli_query($mysqli, $in);

$savedSection = "Added Section!";

echo "
<script type='text/javascript'>
\n";
echo "alert('$savedSection');\n";
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
