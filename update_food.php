<?php

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

// Create connection
$conn = mysqli_connect(HOST,USER,PASS,DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
$available = $_POST['available'];
$category = $_POST['category'];

$sql = "UPDATE products SET product_id='".$product_id."', product_name='".$product_name."', product_description='".$product_description."', product_price='".$product_price."', product_image='".$product_image."', available='".$available."', category='$category' WHERE product_id='".$product_id."'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>