<?php
    
    include_once 'testLogin.php';
    
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
    echo "window.location=('SPPage1.php');\n";
    echo "</script>";
    
    exit();
    
    
?>

