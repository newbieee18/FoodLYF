<?php 
session_start();

include('DataBaseConfig.php');

$link = mysqli_connect("localhost", "root", "", "fad_db");

if($link === false){
 die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
 
if(isset($_POST['username']))
    $username = $_POST['username'];
   if(isset($_POST['password']))
    $password = $_POST['password'];

if(strtolower($username) == $username && strtolower($password) == $password){
$sql = "SELECT * from admin where username = '$username' and password = '$password'";
    $result = mysqli_query($link,$sql) or die(mysqli_error($link));
         
  //  $row = ;
    if(mysqli_num_rows($result)==1){
        $sql1 = "SELECT fullname from admin where username = '$username' and password = '$password'";
        $result1 = mysqli_query($link,$sql1) or die(mysqli_error($link));
        if (mysqli_num_rows($result1) > 0) {
            while($row = mysqli_fetch_assoc($result1)) {
                echo '<script type = "text/javascript">';
                echo 'alert("HELLO! WELCOME '.$row['fullname'].'");'; 
                echo 'window.location.href = "adminDashboard.php";';
                echo '</script>';
            }
              $_SESSION['id']=$username;
              $_SESSION['loggedin'] = true;
        }
    }
    
}
    else{
            if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    //header("location: login.php");
    
    }
    echo '<script>alert("Invalid Account!"); location.replace(document.referrer);</script>';
}
?>