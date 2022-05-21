<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$phone = $_GET['phone'];
$query = "SELECT * FROM store WHERE phone LIKE '%$phone%'";
$result = mysqli_query($con,$query);

while($row1 = mysqli_fetch_array($result)){

	$store_name = $row1['store_name'];

$sql = "select * from outlets where store_name='$store_name'";

$res = mysqli_query($con,$sql);
 
$outlets = array();
 
while($row = mysqli_fetch_array($res)){
array_push($outlets,array('outlet_id'=>$row[0], 'outlet_phone'=>$row[1], 'outlet_sname'=>$row[2], 'outlet_bname'=>$row[3], 'outlet_latitude'=>$row[4], 'outlet_longitude'=>$row[5]));
}

}

echo json_encode(array("outlets"=>$outlets));
 
mysqli_close($con);


?>