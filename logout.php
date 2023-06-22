<?php
session_start(); // start session with the user who logged in
session_destroy(); // destroy entire session, because user is logging out
unset($_SESSION['fname']); // remove the first name from session
unset($_SESSION['lname']); // remove the last name from session
unset($_SESSION['email']); // remove the email from session
$_SESSION['message']="You are now logged out"; // 
echo '<script>alert("'.$_SESSION['message'].'")</script>'; // display the message
echo '<script>window.location.href = "login.php";</script>'; // redirects to login.php
?>