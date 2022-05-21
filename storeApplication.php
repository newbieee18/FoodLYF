<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['phone']) && isset($_POST['business_name']) && isset($_POST['store_name']) && isset($_POST['merchant_address']) && isset($_POST['city']) && isset($_POST['outlets']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['dti_certification']) && isset($_POST['business_permit']) && isset($_POST['form9']) && isset($_POST['form13']) && isset($_POST['form49']) && isset($_POST['valid_id']) && isset($_POST['halal_certificate'])) {
    if ($db->dbConnect()) {
        if ($db->storeApplication("business", $_POST['phone'], $_POST['business_name'], $_POST['store_name'], $_POST['merchant_address'], $_POST['city'], $_POST['outlets'], $_POST['name'], $_POST['email'], $_POST['dti_certification'], $_POST['business_permit'], $_POST['form9'], $_POST['form13'], $_POST['form49'], $_POST['valid_id'], $_POST['halal_certificate'])) {
            echo "Your application has been submitted!";
        } else echo "Application Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
