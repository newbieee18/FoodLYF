<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);

$phone = $_GET['phone'];

$sql = "SELECT * FROM orders WHERE customer_phone='$phone'";
 
$res = mysqli_query($con,$sql);

$orderList = array();
 
while($row = mysqli_fetch_array($res)){
array_push($orderList,array('order_id'=>$row[0], 'customer_phone'=>$row[1], 'customer_name'=>$row[2], 'customer_address'=>$row[3], 'product_name'=>$row[4], 'quantity'=>$row[5], 'subtotal'=>$row[6], 'total'=>$row[8], 'latitude'=>$row[9], 'longitude'=>$row[10], 'store_name'=>$row[11], 'suggestion'=>$row[13], 'status'=>$row[14], 'rider_phone'=>$row[18], 'rider_latitude'=>[19], 'rider_longitude'=>20));
}

echo json_encode(array("orderList"=>$orderList));
 
mysqli_close($con);


?>