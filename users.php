<?php 


define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','fad_db');

 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$sql = "select * from users";
 
$res = mysqli_query($con,$sql);
 
$users = array();
 
while($row = mysqli_fetch_array($res)){
array_push($users,array('id'=>$row[0], 'username'=>$row[1], 'fullname'=>$row[3], 'position'=>$row[9], 'password'=>$row[2], 'gender'=>$row[5], 'contact'=>$row[6], 'email'=>$row[7], 'address'=>$row[8], 'age'=>$row[4]));
}
 
echo json_encode(array("users"=>$users));
 
mysqli_close($con);


?>