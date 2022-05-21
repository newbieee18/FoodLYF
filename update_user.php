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

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];

$sql = "UPDATE users SET fullname='".$fullname."', email='".$email."', address='".$address."' WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>