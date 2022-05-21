<?php

$db = mysqli_connect("localhost","root","","fad_db");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

    $id = $_POST['id']; 
	
    $sql = mysqli_query($db,"DELETE FROM outlets WHERE id='$id'");
	
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