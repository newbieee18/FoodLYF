<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['phone']) && isset($_POST['fullname']) && isset($_POST['gender']) && isset($_POST['birth_date']) && isset($_POST['email']) && isset($_POST['display_picture']) && isset($_POST['drivers_license']) && isset($_POST['nbi']) && isset($_POST['tin']) && isset($_POST['contact_person']) && isset($_POST['person_relationship']) && isset($_POST['person_number'])) {
    if ($db->dbConnect()) {
        if ($db->riderApplication("rider", $_POST['phone'], $_POST['fullname'], $_POST['gender'], $_POST['birth_date'], $_POST['email'], $_POST['display_picture'], $_POST['drivers_license'], $_POST['nbi'], $_POST['tin'], $_POST['contact_person'], $_POST['person_relationship'], $_POST['person_number'])) {
            echo "Application Success!";
        } else echo "Sign up Failed! User exists";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>