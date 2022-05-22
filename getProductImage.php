<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
$product_name  = $_GET['product_name'];
 
$sql = "select product_image from products where product_name like '%".$product_name."'";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,array('product_image'=>$row[0]));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);


?>