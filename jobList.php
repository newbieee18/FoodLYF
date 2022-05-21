<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);

$phone = $_GET['phone'];
$lat = $_GET['latitude'];
$long = $_GET['longitude'];

$sql = "SELECT order_id, customer_phone, customer_name, customer_address, product_name, SUM(quantity), subtotal, latitude, longitude, store_name, branch_name, branch_latitude, branch_longitude, SUM(subtotal) AS total FROM orders WHERE status='Order Pickup' GROUP BY customer_phone";


$res = mysqli_query($con,$sql);

$jobs = array();
 
while($row = mysqli_fetch_array($res)){

$sql1 = "SELECT * , (6371 * 2 * ASIN(SQRT( POWER(SIN(( $lat - branch_latitude) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(branch_latitude * pi()/180) * POWER(SIN(( $long - branch_longitude) * pi()/180 / 2), 2) ))) as distance  
                                from orders  
                                group by customer_phone and customer_name
                                having  distance <= 5
                                order by distance";

$res1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($res1)){
	
	array_push($jobs,array('order_id'=>$row[0], 'customer_phone'=>$row[1], 'customer_name'=>$row[2], 'customer_address'=>$row[3], 'product_name'=>$row[4], 'quantity'=>$row[5], 'subtotal'=>$row[6], 'latitude'=>$row[7], 'longitude'=>$row[8], 'store_name'=>$row[9], 'branch_name'=>$row[10], 'branch_latitude'=>$row[11], 'branch_longitude'=>$row[12], 'total'=>$row[13], 'distance'=>$row1[21]));

	
	

}

}

echo json_encode(array("jobs"=>$jobs));

mysqli_close($con);


?>