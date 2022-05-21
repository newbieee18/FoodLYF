<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);

$store_name = $_GET['store_name'];
$category = $_GET['category'];

$sql = "select * from products where store_name='$store_name' AND category='$category' AND available='YES' order by product_description asc";
 
$res = mysqli_query($con,$sql);
 
$products = array();
 
while($row = mysqli_fetch_array($res)){
array_push($products,array('product_id'=>$row[0], 'product_name'=>$row[1], 'product_description'=>$row[2], 'product_price'=>$row[3], 'product_image'=>$row[4], 'ratings'=>$row[5]));
}
 
echo json_encode(array("products"=>$products));
 
mysqli_close($con);


?>