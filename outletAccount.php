<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$phone = $_GET['phone'];

$sql = "select * from outlets where phone='$phone'";
 
$res = mysqli_query($con,$sql);
 
$outletAccount = array();
 
while($row = mysqli_fetch_array($res)){
array_push($outletAccount,array('outlet_id'=>$row[0], 'outlet_phone'=>$row[1], 'outlet_sname'=>$row[2], 'outlet_bname'=>$row[3], 'outlet_latitude'=>$row[4], 'outlet_longitude'=>$row[5]));
}
 
echo json_encode(array("outletAccount"=>$outletAccount));
 
mysqli_close($con);


?>