<?php 

    session_start(); // session start

 //   $_SESSION = array(); // unset all the session vars


    session_destroy(); // destroy the session

    header("Location: employee_login.php");

?>

