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
?>



<body>
    
    <div class="center">
        <h1>CHOWDER</h1>
    </div>


    <div class="container">

        <form class="dig-form" action="addDig.php" method="POST">
            <div class="row">
                <div class="col-25">
                    <p>Date</p>
                </div>
                <div class="col-75">
                    <input type="date" id="date" name="date">

                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <p>Location</p>
                </div>
                <div class="col-75">
                    <input type="text" id="location" name="location" placeholder="Location">

                </div>
            </div>
          
            <div class="row">
                <input type="submit" value="Submit">
            </div>

        </form>
    </div>

</body>
</html>