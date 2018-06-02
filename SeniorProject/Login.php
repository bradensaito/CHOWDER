<?php
   include "authenticate.php";
   if (isset($_POST['uname'])) {
      $username = stripslashes($_REQUEST['uname']);
      $username = mysqli_real_escape_string($mysqli,$username);
      $password = stripslashes($_REQUEST['psw']);
      $password = mysqli_real_escape_string($mysqli,$password);
      $query = "SELECT permissions FROM `accounts` WHERE username='$username'and pass='".hash('sha512',$password)."'";
      $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
      $rows = mysqli_num_rows($result);
      if($rows==1){
         $_SESSION['username'] = $username;
         $_SESSION['permissions'] = mysqli_fetch_assoc($result)['permissions'];
         if ($_SESSION["permissions"] == 4) {
            header("Location: SPPage1.php");
         }
      }else{
         echo "<div class='form'>
         <h1>Username/password is incorrect.</h1>
         <br/>Click here to <a href='login.php'>Login</a></div>";
      }
   } else {
      header("Location: SPLoginPage.html");
   }
?>
