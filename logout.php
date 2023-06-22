<?php
session_start(); //to ensure you are using same session
session_destroy(); // destroy entire session
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['email']);
$_SESSION['message']="You are now logged out";
echo '<script>alert("'.$_SESSION['message'].'")</script>';
echo '<script>window.location.href = "login.php";</script>'; // redirects to index.php
?>