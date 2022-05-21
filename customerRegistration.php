<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['phoneNumber']) && isset($_POST['customerName']) && isset($_POST['customerAddress']) && isset($_POST['customerEmail'])) {
    if ($db->dbConnect()) {
        if ($db->customerRegistration("users", $_POST['phoneNumber'], $_POST['customerName'], $_POST['customerAddress'], $_POST['customerEmail'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed! User exists";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
