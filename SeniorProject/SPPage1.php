<?php
   include "authenticate.php";
   $permission_level = 4;
   permissionAuth($permission_level);
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


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
<script src="jquery.min.js"></script>

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
        <h1>CHOWDER</h1>
    </div>


    <div class="container">

        <form class="clam-form" action="addClam.php" method="POST">
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
                    <p>Transect</p>
                </div>
                <div class="col-75">
                    <select name="transect" id="transect">
                        <option value="">Select dig first</option>
                    </select>

                    <button type="button" onclick="location.href = 'addTransectPage.php';" id="addDig">Add Transect</button>

                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <p>Section</p>
                </div>
                <div class="col-75">
                    <input type="text" id="section" name="section" placeholder="Section Number">
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
