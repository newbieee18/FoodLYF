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

$query = "SELECT * FROM store WHERE phone LIKE '%$phone%'";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){
    $store_name = $row['store_name'];


    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $available = $_POST['available'];
    $category = $_POST['category'];


$sql = "INSERT INTO products (product_name, product_description, product_price, product_image, available, store_name, category) VALUES ('".$product_name."', '".$product_description."', '".$product_price."', '".$product_image."', '".$available."', '".$store_name."', '$category')";

if ($conn->query($sql) === TRUE) {
  echo "Successfully Added!";
} else {
  echo "Error adding record: " . $conn->error;
}

}

$conn->close();
?>