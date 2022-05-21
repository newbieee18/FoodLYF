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

$query = "SELECT * FROM users WHERE phone LIKE '%$phone%'";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($result)){

	$customer_name = $row['fullname'];
    $product_name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $subtotal = $_POST['subtotal'];
    $product_image = $_POST['product_image'];

	$checkProduct = "SELECT * FROM cart WHERE product_name='$product_name' && customer_name='$customer_name'";
	$res = mysqli_query($conn, $checkProduct);

	while($data = mysqli_fetch_array($res)){
		
		if (mysqli_num_rows($res) > 0) {
	 		$qty = $data['quantity'];
	 		$price = $data['price'];
			$updatedQty = $qty + 1;
			$updatedStl = $updatedQty * $price;
			$updateProduct = "UPDATE cart SET quantity='$updatedQty', subtotal='$updatedStl' WHERE product_name='$product_name' && customer_name='$customer_name'";

			if ($conn->query($updateProduct) === TRUE)
  				echo "Successfully Added!";
			else
  				echo "Error adding record: " . $conn->error;

		}
	}
		if (mysqli_num_rows($res) <= 0) {
			$sql = "INSERT INTO cart (customer_name, product_name, price, quantity, subtotal, product_image) VALUES ('".$customer_name."', '".$product_name."', '".$price."','".$quantity."', '".$subtotal."', '".$product_image."')";

			if ($conn->query($sql) === TRUE)
  				echo "Successfully Added!";
			else 
  				echo "Error adding record: " . $conn->error;
			

		}

	
}

$conn->close();
?>