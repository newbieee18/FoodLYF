<?php

$db = mysqli_connect("localhost","root","","fad_db");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

    $product_id = $_POST['product_id']; 
	
    $sql = mysqli_query($db,"DELETE FROM products WHERE product_id='$product_id'");
	
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