<?php
   include "authenticate.php";
    
    //Checks for permissions of the user and directs them to the according main page
    
   if (isset($_POST['uname'])) {
      $username = stripslashes($_REQUEST['uname']);
      $username = mysqli_real_escape_string($mysqli,$username);
      $password = stripslashes($_REQUEST['psw']);
      $password = mysqli_real_escape_string($mysqli,$password);
      $query = "SELECT id, permissions FROM `accounts` WHERE username='$username'and pass='".hash('sha512',$password)."'";
      $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
      $rows = mysqli_num_rows($result);
      if($rows>0){
         $assoc = mysqli_fetch_assoc($result);
         $_SESSION['username'] = $username;
         $_SESSION['permissions'] = $assoc['permissions'];
         $_SESSION['id'] = $assoc['id'];
         switch ($_SESSION["permissions"]) {
            case 1:
               header("Location: SPLevel1.php");
               break;
            case 2:
               header("Location: SPLevel2.php");
               break;
            case 3:
               header("Location: SPLevel3.php");
               break;
            case 4:
               header("Location: SPPage1.php");
               break;
         }
      }else{
         echo "<div class='form'>
         <h1>Username/password is incorrect.</h1>
         <br/>Click here to <a href='login.php'>Login</a></div>";
      }
   } else {
      header("Location: index.html");
   }
?>
