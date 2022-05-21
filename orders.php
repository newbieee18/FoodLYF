<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);

$branch_phone = $_GET['phone'];

$sql = "SELECT order_id, customer_phone, customer_name, customer_address, product_name, SUM(quantity), subtotal, latitude, longitude, store_name, SUM(subtotal) AS total FROM orders WHERE status='' GROUP BY customer_phone";


$res = mysqli_query($con,$sql);

$orders = array();
 
while($row = mysqli_fetch_array($res)){

$lat = $row['latitude'];
$long = $row['longitude'];

$sql1 = "SELECT * , (6371 * 2 * ASIN(SQRT( POWER(SIN(( $lat - latitude) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(latitude * pi()/180) * POWER(SIN(( $long - longitude) * pi()/180 / 2), 2) ))) as distance  
                                from outlets  
                                having  distance <= 5
                                order by distance";

$res1 = mysqli_query($con,$sql1);

while($row1 = mysqli_fetch_array($res1)){

	if($branch_phone == $row1['phone']){
		array_push($orders,array('order_id'=>$row[0], 'customer_phone'=>$row[1], 'customer_name'=>$row[2], 'customer_address'=>$row[3], 'product_name'=>$row[4], 'quantity'=>$row[5], 'subtotal'=>$row[6], 'latitude'=>$row[7], 'longitude'=>$row[8], 'store_name'=>$row[9], 'total'=>$row[10], 'distance'=>$row1[6]));

		echo json_encode(array("orders"=>$orders));
	}
	else echo "No output";

}


}


 
mysqli_close($con);


?>