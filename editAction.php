<?php
// Include the database connection file
require_once("connect_db.php");
// Get the hidden ID field value

if (isset($_POST['update-btn'])) {
  // Escape special characters in a string for use in an SQL statement
  $id = mysqli_real_escape_string($conn, $_POST['id']); // Assuming you have an input field with name="id" in the form.
  $type = mysqli_real_escape_string($conn, $_POST['type']);
  $model = mysqli_real_escape_string($conn, $_POST['model']);
  $color = mysqli_real_escape_string($conn, $_POST['color']);
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  
    // Update the database table
  $result = mysqli_query($conn, "UPDATE products SET `type` = '$type', `model` = '$model', `color` = '$color', `quantity` = $quantity, `status` = '$status', `last_updated` = CURRENT_TIMESTAMP WHERE `id` = $id");

  // Display success message
  echo '<script>alert("Data updated successfully!")</script>';
  // Redirect to the view page
  echo '<script>window.location.href = "inventory.php";</script>';
}
?>