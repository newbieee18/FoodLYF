<?php

$db = mysqli_connect("localhost", "root", "", "fad_db");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$content = htmlspecialchars($_POST['announcement']);
$add_sql = "INSERT INTO announcements (announcement) VALUES ('$content')" or die(mysqli_error($db));

$add_query = $db->query($add_sql);

if (!$add_query) {
    echo 0;
} else {
    $data = ['id' => mysqli_insert_id($db), 'content'=>$content];
    echo json_encode($data);
 
}
