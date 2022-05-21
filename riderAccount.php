<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
$phone  = $_GET['phone'];
 
$sql = "select * from rider where phone='".$phone."'";
 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,array('id'=>$row[0], 'phone'=>$row[1], 'fullname'=>$row[2], 'gender'=>$row[3], 'birthdate'=>$row[4], 'email'=>$row[5]));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);


?>