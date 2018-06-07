<?php
    
    include_once "authenticate.php";
    
    //Fills in the final information of the transect, the end time and end location
    
    $transect = mysqli_real_escape_string($mysqli, $_POST['transect']);
    $latitude = mysqli_real_escape_string($mysqli, $_POST['curLat']);
    $longitude = mysqli_real_escape_string($mysqli, $_POST['curLong']);
    
    $query = $mysqli->query("SELECT * FROM transects");
    $rowCount = $query->num_rows;
    $rowCount++;
    
    $in = "UPDATE transects SET endtime=CURRENT_TIMESTAMP, endlat=$latitude, endlong=$longitude WHERE id=$transect";
    
    mysqli_query($mysqli, $in);
    
    $traversedthetransect = "Ended Transect!";
    
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

