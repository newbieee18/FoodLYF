<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);

$phone = $_GET['phone'];


$query = "SELECT * FROM store WHERE phone='$phone'";
$result = mysqli_query($con, $query);
while($data = mysqli_fetch_array($result)){
	$store_name = $data['store_name'];

	$query1 = "SELECT customer_phone, customer_name, customer_address, product_name, quantity, subtotal, dfee, total, latitude, longitude, store_name, date_time, suggestion, status, branch_name, branch_latitude, branch_longitude, rider_phone, rider_latitude, rider_longitude, COUNT(*) AS total_orders FROM transaction WHERE store_name='$store_name'";
	$result1 = mysqli_query($con, $query1);
	$transaction = array();
	while($data1 = mysqli_fetch_array($result1)){
		array_push($transaction,array('customer_phone'=>$data1[0], 'customer_name'=>$data1[1], 'customer_address'=>$data1[2], 'product_name'=>$data1[3], 'quantity'=>$data1[4], 'subtotal'=>$data1[5], 'dfee'=>$data1[6], 'total'=>$data1[7], 'latitude'=>$data1[8], 'longitude'=>$data1[9], 'store_name'=>$data1[10], 'date_time'=>$data1[11], 'suggestion'=>$data1[12], 'status'=>$data1[13], 'branch_name'=>$data1[14], 'branch_latitude'=>$data1[15], 'branch_longitude'=>$data1[16], 'rider_phone'=>$data1[17], 'rider_latitude'=>$data1[18], 'rider_longitude'=>$data1[19], 'total_orders'=>$data1[20]));
	}	

	echo json_encode(array("transaction"=>$transaction));
 
	mysqli_close($con);

}


?>