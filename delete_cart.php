<?php

$db = mysqli_connect("localhost","root","","fad_db");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

    $cart_id = $_POST['cart_id']; 
	
    $sql = mysqli_query($db,"DELETE FROM cart WHERE cart_id='$cart_id'");
	
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



?>