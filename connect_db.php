<?php
  $db_server_name = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "shop_minimalist_db";
  $conn = ""; // variable to store the connection

  try{
     // establish a connection to MYSQl database
    $conn = mysqli_connect($db_server_name, $db_user, $db_password, $db_name);
  } catch (mysqli_sql_exception){
    // if cannot connect to database, show an alert
    echo '<script>alert("Cannot connect to database!")</script>';
  }
?>