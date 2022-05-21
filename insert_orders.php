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

$phone = $_POST['phone'];
$customer_address = $_POST['customer_address'];
$store_name = $_POST['store_name'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$suggestion = $_POST['suggestion'];
$deliveryFee = $_POST['delivery_fee'];
$total = $_POST['total'];

$query = "SELECT * FROM users WHERE phone='$phone'";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

$customer_name = $row['fullname'];

$query1 = "SELECT * FROM cart WHERE customer_name='$customer_name'";
$result1 = mysqli_query($conn,$query1);

while($row1 = mysqli_fetch_array($result1)){
$product_name = $row1['product_name'];
$quantity = $row1['quantity'];
$subtotal = $row1['subtotal'];
$date_time = date('Y-m-d H:i:s');


$sql = "INSERT INTO orders(customer_phone, customer_name, customer_address, product_name, quantity, subtotal, dfee, total, latitude, longitude, store_name, date_time, suggestion) VALUES ('$phone', '$customer_name', '$customer_address', '$product_name', '$quantity', '$subtotal', '$deliveryFee', '$total', '$latitude', '$longitude', '$store_name', '$date_time', '$suggestion')";
$sql1 = "DELETE FROM cart WHERE customer_name='$customer_name'";

if (mysqli_query($conn, $sql)) {
	if (mysqli_query($conn, $sql1)){
		echo "";
	}
} else {
  echo "Error updating record: " . $conn->error;
}


}
}

$conn->close();
?>