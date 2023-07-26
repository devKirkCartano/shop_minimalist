<?php
// Include the database connection file
require_once("connect_db.php");
// Get the hidden ID field value

if (isset($_POST['update-btn'])) {
  // Escape special characters in a string for use in an SQL statement
  $id = mysqli_real_escape_string($conn, $_POST['id']); // Assuming you have an input field with name="id" in the form.
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
  $lname = mysqli_real_escape_string($conn, $_POST['last_name']);

  // Update the database table
  $result = mysqli_query($conn, "UPDATE users SET `email` = '$email', `fname` = '$fname', `lname` = '$lname',  `last_updated` = CURRENT_TIMESTAMP WHERE `id` = $id");
  // Redirect to the view page
  echo '<script>window.location.href = "logout.php";</script>';
}
?>