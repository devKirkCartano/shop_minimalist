<?php
session_start(); //
session_destroy(); // destroy entire session
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['email']);
$_SESSION['message']="You are now logged out";
echo '<script>alert("'.$_SESSION['message'].'")</script>';
echo '<script>window.location.href = "index.php";</script>'; // redirects to index.php
?>