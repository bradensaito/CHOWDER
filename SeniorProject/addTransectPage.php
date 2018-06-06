<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">



<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CHOWDER</title>
</head>


<?php
include_once 'testLogin.php';
$digs = mysqli_query($mysqli, "SELECT * FROM digs");
?>



<body>
    
    <div class="center">
        <h1>CHOWDER</h1>
    </div>


    <div class="container">

        <form class="transect-form" action="addTransect.php" method="POST">
            <div class="row">
                <div class="col-25">
                    <p>Dig</p>
                </div>
                <div class="col-75">
                    <select name="dig" id="dig">
                        
                        <option selected value = "dig0">Select Dig</option>

                        <?php
                        
                        while($row = $digs->fetch_assoc())
                        {
                            echo '<option value="' . $row['id'].'" >' .$row['digdate'] .'</option>';
                        }
                        ?>
                        

                    </select>

               
                    <button type="button" onclick="location.href = 'addDigPage.php';" id="addDig">Add Dig</button>

                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <p>Starting Latitude</p>
                </div>
                <div class="col-75">
                    <input type="number" id="latitude" name="latitude" placeholder="Latitude">

                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <p>Starting Longitude</p>
                </div>
                <div class="col-75">
                    <input type="number" id="longitude" name="longitude" placeholder="Longitude">

                </div>
            </div>
            
          
            <div class="row">
                <input type="submit" value="Submit">
            </div>
			<div class="row">
                <button type="button" class="cancelbtn" onclick="location.href = 'SPPage1.php';">Cancel</button>
            </div>

        </form>
    </div>

</body>
</html>