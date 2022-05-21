<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
$product_id = $_GET['edit'];

$sql = "select * from products where product_id like '%$product_id%'";
 
$res = mysqli_query($con,$sql);
 
$editFoodProducts = array();
 
while($row = mysqli_fetch_array($res)){
array_push($editFoodProducts,array('product_id'=>$row[0], 'product_name'=>$row[1], 'product_description'=>$row[2], 'product_price'=>$row[3], 'product_image'=>$row[4], 'ratings'=>$row[5], 'available'=>$row[6], 'category'=>$row[8]));
}

 
echo json_encode(array("editFoodProducts"=>$editFoodProducts));
mysqli_close($con);


?>