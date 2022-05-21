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

$phoneNumber = $_POST['phone_number'];

$query = "SELECT * FROM store WHERE phone LIKE '%$phoneNumber%'";
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);
$store_name = $row['store_name'];

$phone = $_POST['phone'];
$branch_name = $_POST['branch_name'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$sql = "INSERT INTO outlets (phone, store_name, branch_name, latitude, longitude) VALUES ('".$phone."', '".$store_name."', '".$branch_name."', '".$latitude."', '".$longitude."')";

if ($conn->query($sql) === TRUE) {
  echo "Successfully Added!";
} else {
  echo "Error adding record: " . $conn->error;
}



$conn->close();
?>