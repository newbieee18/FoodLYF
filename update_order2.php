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

$status = $_GET['status'];
$customer_phone = $_GET['customer_phone'];

$sql1 = "UPDATE orders SET status='$status' WHERE customer_phone='$customer_phone'";

if ($conn->query($sql1) === TRUE) {
  echo "Record updated successfully";
  //$sql2 = "INSERT INTO transaction "
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>