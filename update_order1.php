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

$rider_latitude = $_POST['rider_latitude'];
$rider_longitude = $_POST['rider_longitude'];
$status = $_POST['status'];
$customer_phone = $_POST['customer_phone'];
$rider_phone = $_POST['rider_phone'];

$sql1 = "UPDATE orders SET status='$status', rider_latitude='$rider_latitude', rider_longitude='$rider_longitude', rider_phone='$rider_phone' WHERE customer_phone='$customer_phone'";

if ($conn->query($sql1) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>