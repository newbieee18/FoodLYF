<?php

$db = mysqli_connect("localhost","root","","fad_db");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

    $phone = '9984772627'; 
	
    $query = "SELECT * FROM users WHERE phone='$phone'";
	$result = mysqli_query($db, $query);

    while($row = mysqli_fetch_array($result)){
        $name = $row['fullname'];
        $sql = mysqli_query($db,"DELETE FROM cart WHERE customer_name='$name'");

    
    if($sql)
    {
        mysqli_close($db); // Close connection
        echo "Record deleted successfully";
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
    }


?>