<?php
    //Ends the session and boots the user back to the login screen
    session_start();
    session_unset();  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
    header("Location: index.html");
    ?>
