<?php
// Include the database connection file
require_once("connect_db.php");
// Get the hidden ID field value

if (isset($_POST['update-sales-btn'])) {
  // Escape special characters in a string for use in an SQL statement
  $id = mysqli_real_escape_string($conn, $_POST['id']); // Assuming you have an input field with name="id" in the form.
  $customer_name = mysqli_real_escape_string($conn, $_POST['customer-name']); // store the type
  $date = mysqli_real_escape_string($conn, $_POST['date']); // store the model
  $shipment = mysqli_real_escape_string($conn, $_POST['shipment']); // store the color
  $type = mysqli_real_escape_string($conn, $_POST['type']); // store the quantity
  $model = mysqli_real_escape_string($conn, $_POST['model']); // store the status
  $color = mysqli_real_escape_string($conn, $_POST['color']); // store the status
  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']); // store the status
  $amount = mysqli_real_escape_string($conn, $_POST['amount']); // store the status
  $total = mysqli_real_escape_string($conn, $_POST['total']); // store the status

  // Update the database table
  $result = mysqli_query($conn, "UPDATE sales SET `customer_name` = '$customer_name', `date` = '$date', `shipment` = '$shipment', `type` = '$type', `model` = '$model', `color` = '$color', `quantity` = '$quantity', `amount` = '$amount', `total` = '$total'  WHERE `id` = $id");
  // Display success message
  echo '<script>alert("Data updated successfully!")</script>';
  // Redirect to the view page
  echo '<script>window.location.href = "salesInventory.php";</script>';
}
?>