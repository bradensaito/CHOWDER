<?php
   include "authenticate.php";
   $permission_level = 3;
   permissionAuth($permission_level);
   $digs = mysqli_query($mysqli, "SELECT * FROM digs");
?>
<!DOCTYPE html>

<!--This page gathers the necessary information about a dig from the user-->

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CHOWDER</title>
</head>


<body>
    
    <div class="center">
        <h1>C.H.O.W.D.E.R.</h1>
    </div>

    <div class="container">

        <form class="dig-form" action="addDig.php" method="POST">
            <div class="row">
                <div class="center">
                    <h3>Date</h3>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <input type="date" id="date" name="date">
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <h3>Location</h3>
                </div>
            </div>
            <div class="row">
                <div class="center">
                    <input type="text" id="location" name="location" placeholder="Location">
                </div>
            </div>

            <br>
            <br>

            <div class="row">
                <div class="center">
                    <input type="submit" value="Submit">
                </div>
            </div>

        </form>
        <div class="center">
		<button type="button" class="cancelbtn" onclick="location.href='javascript:history.go(-1)'">Cancel</button>
        </div>
    </div>

</body>
</html>
