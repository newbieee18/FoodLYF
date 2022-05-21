<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);

$storeName = $_GET['storeName']; 
$sql = "select * from store where store_name='$storeName'";
 
$res = mysqli_query($con,$sql);
 
$store = array();
 
while($row = mysqli_fetch_array($res)){
array_push($store,array('id'=>$row[0], 'phone'=>$row[1], 'store_name'=>$row[2], 'store_image'=>$row[3]));
}
 
echo json_encode(array("store"=>$store));
 
mysqli_close($con);


?>