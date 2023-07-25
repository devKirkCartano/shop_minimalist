<?php
// Include the database connection file
require_once("connect_db.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($conn, "DELETE FROM products WHERE id = $id");

// Display success message
echo '<script>alert("Data deleted successfully!")</script>';
echo '<script>window.location.href="inventory.php"</script>'; // redirect to inventory.php page
