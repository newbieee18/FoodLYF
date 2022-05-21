<?php 
$db = mysqli_connect("localhost","root","","fad_db");

if (isset($_GET['acceptRider'])){
    $id = $_GET['acceptRider'];
    $sql = mysqli_query($db,"update rider set status='Verified' where id='$id'");
    $sql1 = mysqli_query($db,"SELECT * FROM rider WHERE id='$id'");

    while($row = mysqli_fetch_array($sql1)){


    if($sql)
    {
        
       
        $to_email = $row['email'];
        $subject = "Application Update";
        $body = "Hi this is FoodLYF Corporation, Congratulation! your application has been accepted!\nNote: Use your phone number for login.";
        $headers = "From: foodlyf21@gmail.com";
 
        if (mail($to_email, $subject, $body, $headers) ? 1 : 0) {
            echo '<script type = "text/javascript">';
                echo 'alert("Updated Successfully!");'; 
                echo 'window.location.href = "riders.php";';
                echo '</script>';
        } else {
            echo "Email sending failed...";
        }

        mysqli_close($db); // Close connection
        exit;
    }
    else
    {
        echo mysqli_error();
    }  
    }   
}

if (isset($_GET['acceptStore'])){
    $id = $_GET['acceptStore'];
    $sql = mysqli_query($db,"update business set status='Verified' where id='$id'");
    $sql1 = mysqli_query($db,"SELECT * FROM business WHERE id='$id'");
    
    while($row = mysqli_fetch_array($sql1)){
        
     
    if($sql)
    {   
        
        $phone = $row['phone'];
        $store_name = $row['store_name'];
        
        $to_email = $row['email'];
        $subject = "Application Update";
        $body = "Hi this is FoodLYF Corporation, Congratulation! your application has been accepted!\nNote: Use your phone number for login.";
        $headers = "From: foodlyf21@gmail.com";
 
        if (mail($to_email, $subject, $body, $headers)) {
            echo '<script type = "text/javascript">';
                echo 'alert("Updated Successfully!");'; 
                echo 'window.location.href = "stores.php";';
                echo '</script>';
                $sql2 = mysqli_query($db,"INSERT INTO store (phone, store_name, store_image) VALUES ('$phone', '$store_name', NULL)");
        } else {

            $sql = mysqli_query($db,"update business set status='Not Verified' where id='$id'");
            echo "Email sending failed...";
        }

        
        mysqli_close($db); // Close connection        
        exit;
    }
    else
    {
        echo mysqli_error();
    }   
    } 
}

?>