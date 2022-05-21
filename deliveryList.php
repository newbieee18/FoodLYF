<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);

$phone = $_GET['phone'];

$sql = "SELECT * FROM orders WHERE customer_phone='$phone' AND status='Order Pickup'";
 
$res = mysqli_query($con,$sql);

$deliveryList = array();
 
while($row = mysqli_fetch_array($res)){
array_push($deliveryList,array('order_id'=>$row[0], 'customer_phone'=>$row[1], 'customer_name'=>$row[2], 'product_name'=>$row[4], 'quantity'=>$row[5], 'subtotal'=>$row[6], 'dfee'=>$row[7], 'total'=>$row[8], 'latitude'=>$row[9], 'longitude'=>$row[10], 'store_name'=>$row[11], 'suggestion'=>$row[13], 'branch_name'=>$row[15], 'branch_latitude'=>$row[16], 'branch_longitude'=>$row[17]));
}

echo json_encode(array("deliveryList"=>$deliveryList));
 
mysqli_close($con);


?>