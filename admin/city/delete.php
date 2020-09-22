<?php require_once "../../app.php"; 


if(isset($_GET['city_id']) && is_numeric($_GET['city_id'])){
  $city_id = $_GET['city_id'];
  // $row = getOne('cities', 'city_id = "$city_id"');
  $isDeleted = deleteRow('cities', "city_id = '$city_id'");
  if (!$isDeleted)
    abort();
   else
   aredirect('city/view.php');
}


?>