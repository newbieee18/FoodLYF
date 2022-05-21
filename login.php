<?php
session_start();
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['phoneNumber'])) {
    if ($db->dbConnect()) {
        if ($db->logIn1("users", $_POST['phoneNumber'])) {
            echo "Login Successfully!";
            $id = $_SESSION['id'];
        } 
        else if ($db->login2("store", $_POST['phoneNumber'])){
            echo "Successfully Login..";   
        } 
        else if ($db->logIn3("rider", $_POST['phoneNumber'], "Verified")) {
            echo "Successfully Login!";
        }
        else if ($db->logIn3("rider", $_POST['phoneNumber'], "Not Verified")) {
            echo "Please wait for the confirmation..";
        }
        else if ($db->logIn4("outlets", $_POST['phoneNumber'])) {
            echo "Login Successfully..";
        }
        else echo "Username or Password wrong";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
