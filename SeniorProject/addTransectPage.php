<?php
    include "authenticate.php";
    $digs = mysqli_query($mysqli, "SELECT * FROM digs");
    ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">



<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CHOWDER</title>
</head>


<body>
    
    <div class="center">
        <h1>CHOWDER</h1>
    </div>


    <div class="container">

        <form class="transect-form" action="addTransect.php" method="POST">
            <div class="row">
                <div class="center">
                    <p>Dig</p>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <select name="dig" id="dig">
                        
                        <option selected value = "dig0">Select Dig</option>

                        <?php
                        
                        while($row = $digs->fetch_assoc())
                        {
                            echo '<option value="' . $row['id'].'" >' .$row['digdate'] .'</option>';
                        }
                        ?>
                        

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="center">
               
                    <button type="button" onclick="location.href = 'addDigPage.php';" id="addDig">Add Dig</button>

                </div>
            </div>
            <div class="row">
                <div class="center">
                    <p>Make sure you are standing on the site!</p>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <button type="button" class="location" onclick="getLocation()">Get start location!</button>

                </div>
            </div>

            <div class="row">
                <div class="center">
                    <p>Starting Latitude:</p>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <input type="text" name="curLat" id="curLat" placeholder="Latitude">

                </div>
            </div>

            <div class="row">
                <div class="center">
                    <p>Starting Longitude:</p>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <input type="text" name="curLong" id="curLong" placeholder="Longitude">

                </div>
            </div>

            <br>

            <script type="text/javascript">
            var long = document.getElementById("curLong");
            var lat = document.getElementById("curLat");
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    long.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                alert("Make sure you are standing in the correct spot!");
                document.getElementById("curLong").value = position.coords.longitude;
                document.getElementById("curLat").value = position.coords.latitude;
            }

            function showError(error) {
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        long.innerHTML = "User denied the request for Geolocation."
                        break;
                    case error.POSITION_UNAVAILABLE:
                        long.innerHTML = "Location information is unavailable."
                        break;
                    case error.TIMEOUT:
                        long.innerHTML = "The request to get user location timed out."
                        break;
                    case error.UNKNOWN_ERROR:
                        long.innerHTML = "An unknown error occurred."
                        break;
                }
            }
            </script>

            <div class="row">
                <div class="center">
                    <input type="checkbox" name="orientation" value="Yes">Away from water?<br>

            <br>





            <div class="row">
                <div class="center">
                    <input type="submit" value="Submit">
                </div>
            </div>
			<div class="row">
                <div class="center">
                    <button type="button" class="cancelbtn" onclick="location.href='javascript:history.go(-1)'">Cancel</button>
                </div>
            </div>

        </form>
    </div>

</body>
</html>
