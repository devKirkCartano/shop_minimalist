<?php
  $db_server_name = "localhost";
  $db_user = "id21057423_admin";
  $db_password = "shopminimalist@Admin123";
  $db_name = "id21057423_shop_minimalist_db";
  $conn = ""; // variable to store the connection

  try{
     // try to establish a connection to MYSQl database
    $conn = mysqli_connect($db_server_name, $db_user, $db_password, $db_name);
  } catch (mysqli_sql_exception $e){
    // if cannot connect to database, show an alert
    echo '<script>alert("Cannot connect to database!")</script>';
  }
?>