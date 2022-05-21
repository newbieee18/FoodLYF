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
$phone = $_POST['phone'];
$branch_name = $_POST['branch_name'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$sql = "UPDATE outlets SET phone='".$phone."', branch_name='".$branch_name."', latitude='".$latitude."', longitude='".$longitude."' WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>