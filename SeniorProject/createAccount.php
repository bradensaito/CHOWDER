<?php
   session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="LoginStyleSheet.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>CHOWDER</title>
   </head>
   <body>

      <form action="newAccount.php" method="post">

         <div class="center">

            <h1>Create Login</h1>

         </div>

         <div class="container">

            <label for="firstname"><b>First Name</b></label>
            <input type="text" placeholder="Enter Firstname" name="firstname" required>

            <label for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Lastname" name="lastname" required>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="permissions"><b>Permissions</b></label>
            <select name="permissions" required>
               <option value="1">1</option>
               <?php
                  echo $_SESSION["permissions"];
                  if (2 >= $_SESSION["permissions"]) {
                     echo '<option value="2">2</option>';
                  }
                  if (4 == $_SESSION["permissions"]) {
                     echo '<option value="3">3</option>';
                     echo '<option value="4">4</option>';
                  }
               ?>
            </select>

            <button type="submit">Create</button>
         </div>

         <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
         </div>
      </form>

   </body>
</html>
