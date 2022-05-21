<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
$outletID = $_GET['outletID'];

$sql = "select * from outlets where id='$outletID'";
 
$res = mysqli_query($con,$sql);
 
$editOutlet = array();
 
while($row = mysqli_fetch_array($res)){
array_push($editOutlet,array('outlet_phone'=>$row[1], 'outlet_bname'=>$row[3], 'outlet_latitude'=>$row[4], 'outlet_longitude'=>$row[5]));
}

 
echo json_encode(array("editOutlet"=>$editOutlet));
mysqli_close($con);


?>