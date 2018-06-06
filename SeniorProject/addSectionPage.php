<?php
   include "authenticate.php";
   $permission_level = 4;
   permissionAuth($permission_level);
   $transects = mysqli_query($mysqli, "SELECT * FROM sections");
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

        <form class="dig-form" action="addSection.php" method="POST">
            <div class="row">
                <div class="col-25">
                    <p>Transect</p>
                </div>
                <div class="col-75">
                    <select name="transect" id="transect">
                        
                        <option selected value = "transect0">Select Transect</option>

                        <?php
                        
                        while($row = $transects->fetch_assoc())
                        {
                            echo '<option value="' . $row['id'].'" >' .$row['id'] .'</option>';
                        }
                        ?>
                        

                    </select>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Submit">
            </div>

        </form>
    </div>

</body>
</html>
