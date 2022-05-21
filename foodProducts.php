<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
$phone  = $_GET['phone'];

$query = "select * from store where phone like '%$phone%'";
$result = mysqli_query($con,$query);

while($data = mysqli_fetch_array($result)){
$store_name = $data['store_name'];

$sql = "select * from products where store_name='$store_name' order by product_description asc";
 
$res = mysqli_query($con,$sql);
 
$foodProducts = array();
 
while($row = mysqli_fetch_array($res)){
array_push($foodProducts,array('product_id'=>$row[0], 'product_name'=>$row[1], 'product_description'=>$row[2], 'product_price'=>$row[3], 'product_image'=>$row[4], 'ratings'=>$row[5]));
}
}
 
echo json_encode(array("foodProducts"=>$foodProducts));
 
mysqli_close($con);


?>