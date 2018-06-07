<?php
    //create a new account
   include "authenticate.php";
   if (isset($_POST['username'])) {
      $firstname = stripslashes($_REQUEST['firstname']);
      $firstname = mysqli_real_escape_string($mysqli,$firstname);
      $lastname = stripslashes($_REQUEST['lastname']);
      $lastname = mysqli_real_escape_string($mysqli,$lastname);
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($mysqli,$username);
       $query = "select id from accounts where username='$username'";
       $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
       $rows = mysqli_num_rows($result);
       if ($rows > 0) {
           echo "<script type= 'text/javascript'>\n";
           echo "alert('Username taken');\n";
           echo "window.history.back();\n";
           echo "</script>";
       }
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($mysqli,$password);
      $password = hash('sha512', $password);
      $permissions = $_REQUEST['permissions'];
      $id = mysqli_num_rows(mysqli_query($mysqli, "SELECT id FROM `accounts`")) + 1;
      $update = "INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `permissions`, `pass`, `username`) VALUES ('$id', '$firstname', '$lastname', '$permissions', '$password', '$username');";
      mysqli_query($mysqli, $update);
       
       echo "
       <script type='text/javascript'>
       \n";
       echo "alert('Account made!');\n";
       if (!isset($_SESSION["permissions"])) {
           echo "window.location=('index.html');\n";
       }
       switch ($_SESSION["permissions"]) {
           case 1:
               echo "window.location=('SPLevel1.php');\n";
               break;
           case 2:
               echo "window.location=('SPLevel2.php');\n";
               break;
           case 3:
               echo "window.location=('SPLevel3.php');\n";
               break;
           case 4:
               echo "window.location=('SPPage1.php');\n";
               break;
       }
       echo "</script>";
   }
?>
