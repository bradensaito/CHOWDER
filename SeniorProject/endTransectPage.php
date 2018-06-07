<?php
    include "authenticate.php";
    $date = date("Y-m-d");
    $digs = mysqli_query($mysqli, "SELECT * FROM digs WHERE digdate='$date'");
    ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!--Gathers the information about the end of a transect-->

<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="StyleSheet1.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>CHOWDER</title>
</head>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="jquery.min.js"></script>

<!--jquery script for updating the transect field-->
<script type="text/javascript">
$(document).ready(function(){
                  $("#dig").change(function(){
                                   var digID = $(this).val();
                                   if(digID){
                                   //alert(digID);
                                   $.ajax({
                                          type:'POST',
                                          url:'ajax_dig.php',
                                          data:'mid='+ digID,
                                          success:function(html){
                                          $("#transect").html(html);
                                          //alert("we did it");
                                          },error: function(XMLHttpRequest, textStatus, errorThrown) {
                                          alert(textStatus);
                                          }
                                          });
                                   }else{
                                   $("#transect").html('<option value=""> Select dig2 first </option>');
                                   }
                                   });
                  });
</script>



<body>

    <div class="center">
        <h1>C.H.O.W.D.E.R.</h1>
    </div>


    <div class="container">

        <form class="transect-form" action="endTransect.php" method="POST">
            <div class="row">
                <div class="center">
                    <h3>Dig</h3>
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
                    <h3>Transect</h3>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <select name="transect" id="transect">
                    <option value="">Select dig first</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <p>Make sure you are standing on the site!</p>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <button type="button" class="location" onclick="getLocation()">Get end location!</button>

                </div>
            </div>

            <div class="row">
                <div class="center">
                    <h3>Ending Latitude:</h3>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <input type="text" name="curLat" id="curLat" placeholder="Latitude">

                </div>
            </div>

            <div class="row">
                <div class="center">
                    <h3>Ending Longitude:</h3>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <input type="text" name="curLong" id="curLong" placeholder="Longitude">

                </div>
            </div>


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

