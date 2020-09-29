<?php require_once "../../../app.php";


$city_id = $_GET['city_id'];
$data = ['city_is_active' => "0"];

$is_updated = update('cities', $data, "city_id ='$city_id'");


echo $is_updated;
