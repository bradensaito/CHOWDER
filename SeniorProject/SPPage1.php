﻿
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

        <form>
            <div class="row">
                <div class="col-25">
                    <p>HI</p>
                </div>
                <div class="col-75">
                    <select name="Event">
                        

                        <?php
                        $sql = mysqli_query($mysqli, "SELECT id FROM accounts");
                        while($row = $sql->fetch_assoc())
                        {
                            echo "<option value=\"event1\">" . $row['id'] . "</option>";
                        }
                        ?>
                        

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <p>Transect</p>
                </div>
                <div class="col-75">
                    <select name="Transect">
                        <option value="t1">Transect 1</option>
                        <option value="t2">Transect 2</option>
                        <option value="t3">Transect 3</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <p>Section</p>
                </div>
                <div class="col-75">
                    <select name="Event">
                        <option value="s1">Section 1</option>
                        <option value="s2">Section 2</option>
                        <option value="s3">Section 3</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <p>Size</p>
                </div>
                <div class="col-75">
                    <input type="text" id="size" name="size" placeholder="Size">
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>

        </form>
    </div>

</body>
</html>