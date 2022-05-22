<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
$phone  = $_GET['phone'];
 
$sql = "select * from orders where customer_phone='".$phone."' and status='Delivered'";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,array('order_id'=>$row[0], 'customer_phone'=>$row[1], 'customer_name'=>$row[2], 'customer_address'=>$row[3], 'product_name'=>$row[4], 'quantity'=>$row[5], 'subtotal'=>$row[6], 'total'=>$row[8]));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);


?>