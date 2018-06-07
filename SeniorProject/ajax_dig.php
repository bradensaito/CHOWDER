<?php
include_once "authenticate.php";
//used when updating the transects based on which dig is selected
	$sql=mysqli_query($mysqli, "SELECT * FROM transects WHERE dig_id = " .$_POST['mid']);
	while($noo = $sql->fetch_assoc())
	{
		echo '<option value="'.$noo['id'].'">' . $noo['id'].'</option>';
    }
?>
