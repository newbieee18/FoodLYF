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

$rider_phone = $_POST['rider_phone'];
$rider_name = $_POST['rider_name'];
$rider_email = $_POST['rider_email'];
$rider_gender = $_POST['rider_gender'];
$rider_birthdate = $_POST['rider_birthdate'];

$sql = "UPDATE rider SET fullname='".$rider_name."', gender='".$rider_gender."', birth_date='".$rider_birthdate."', email='".$rider_email."' WHERE phone='".$rider_phone."'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>