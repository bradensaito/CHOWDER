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
