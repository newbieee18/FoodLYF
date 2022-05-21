<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
$phone = $_GET['phone'];

$query = "SELECT * FROM users WHERE phone='$phone'";
$result = mysqli_query($con, $query);

while($row1 = mysqli_fetch_array($result)){
$customer_name = $row1['fullname'];

$sql = "select * from cart where customer_name='$customer_name'";
 
$res = mysqli_query($con,$sql);
 
$cart = array();
 
while($row = mysqli_fetch_array($res)){

array_push($cart,array('cart_id'=>$row[0], 'product_name'=>$row[2], 'price'=>$row[3], 'quantity'=>$row[4], 'subtotal'=>$row[5], 'product_image'=>$row[6]));
}

}

echo json_encode(array("cart"=>$cart));
 
mysqli_close($con);


?>