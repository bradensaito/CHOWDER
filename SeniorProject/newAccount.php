<?php
   include "authenticate.php";
   if (isset($_POST['username'])) {
      $firstname = stripslashes($_REQUEST['firstname']);
      $firstname = mysqli_real_escape_string($mysqli,$firstname);
      $lastname = stripslashes($_REQUEST['lastname']);
      $lastname = mysqli_real_escape_string($mysqli,$lastname);
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($mysqli,$username);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($mysqli,$password);
      $password = hash('sha512', $password);
      $permissions = $_REQUEST['permissions'];
      $id = mysqli_num_rows(mysqli_query($mysqli, "SELECT id FROM `accounts`")) + 1;
      $update = "INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `permissions`, `pass`, `username`) VALUES ('$id', '$firstname', '$lastname', '$permissions', '$password', '$username');";
      mysqli_query($mysqli, $update);
      header("Location: SPLoginPage.html");
   }
?>
