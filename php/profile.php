<?php
require './vendor/autoload.php';
$dob = $_POST['dob'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$mongo = new MongoClient();
$collection = $mongo->guvi_reg_mongo->user_profiles;
$data = array(
    'dob' => $dob,
    'address' => $address,
    'contact' => $contact,
);
$insertOneResult = $collection->insertOne($data);
if ($insertOneResult->getInsertedCount() == 1) {
    echo "Data has been successfully inserted!";
} else {
    echo "An error occurred while inserting the data.";
}
?>