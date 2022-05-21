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

$branch_phone = $_POST['branch_phone'];
$customer_phone = $_POST['customer_phone'];
$status = $_POST['status'];

$sql = "SELECT * FROM outlets WHERE phone='$branch_phone'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);
$branch_name = $row['branch_name'];
$branch_latitude = $row['latitude'];
$branch_longitude = $row['longitude'];

$sql1 = "UPDATE orders SET status='$status', branch_name='$branch_name', branch_latitude='$branch_latitude', branch_longitude='$branch_longitude' WHERE customer_phone='$customer_phone'";

if ($conn->query($sql1) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>