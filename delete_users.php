<?php

$db = mysqli_connect("localhost","root","","fad_db");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['delete'])){
$id = $_GET['delete']; 
	
    $sql = mysqli_query($db,"DELETE FROM users WHERE id='$id'");
	
    if($sql)
    {
        mysqli_close($db); // Close connection
        echo '<script type = "text/javascript">';
                echo 'alert("Updated Successfully!");'; 
                echo 'window.location.href = "customers.php";';
                echo '</script>';
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}

if (isset($_GET['delete1'])){
$id = $_GET['delete1']; 
    
    $sql = mysqli_query($db,"DELETE FROM rider WHERE id='$id'");
    
    if($sql)
    {
        mysqli_close($db); // Close connection
        echo '<script type = "text/javascript">';
                echo 'alert("Updated Successfully!");'; 
                echo 'window.location.href = "riders.php";';
                echo '</script>';
        exit;
    }
    else
    {
        echo mysqli_error();
    }  
}

if (isset($_GET['delete2'])){
$id = $_GET['delete2']; 
    
    $msql = "SELECT * FROM business WHERE id='$id'";

    $res = mysqli_query($db, $msql);

    $row = mysqli_fetch_assoc($res);
        $phone = $row['phone'];
    
    $sql = mysqli_query($db, "DELETE FROM store WHERE phone='$phone'");
    $sql1 = mysqli_query($db,"DELETE FROM business WHERE id='$id'");

    if($sql)
    {
        mysqli_close($db); // Close connection
        echo '<script type = "text/javascript">';
                echo 'alert("Updated Successfully!");'; 
                echo 'window.location.href = "stores.php";';
                echo '</script>';
        exit;
    }
    else
    {
        echo mysqli_error();
    }       
}

?>