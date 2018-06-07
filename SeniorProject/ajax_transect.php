<?php
include_once "authenticate.php";
//Used when updating the sections based on the transect selected
	$sql=mysqli_query($mysqli, "SELECT * FROM sections WHERE transect_id = " .$_POST['mid']);
	while($noo = $sql->fetch_assoc())
	{
		echo '<option value="'.$noo['id'].'">' . $noo['id'].'</option>';
    }

?>
