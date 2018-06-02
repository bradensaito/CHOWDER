<?php
   session_start();
   define('DB_NAME', 'chowder_test1');
   define('DB_USER', 'chowder_test1');
   define('DB_PASSWORD', 'capstone');
   define('DB_HOST', 'db4free.net:3306');
   
   $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
   
   function permissionAuth($level) {
      if (!isset($_SESSION["username"])) {
         header("Location: SPLoginPage.html");
         exit();
      }
      if ($level > $_SESSION["permissions"]) {
         header("Location: " . $_SERVER['HTTP_REFERER']);
         exit();
      }
   }
?>
