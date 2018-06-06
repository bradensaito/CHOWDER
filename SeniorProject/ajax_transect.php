<?php
include('testLogin.php');
//if(isset($_POST["id"]))
//{
//	$id=$_POST["id"];
	$sql=mysqli_query($mysqli, "SELECT * FROM sections WHERE transect_id = " .$_POST['mid']);
	while($noo = $sql->fetch_assoc())
	{
		echo '<option value="'.$noo['id'].'">' . $noo['id'].'</option>';
    }
//}
?>