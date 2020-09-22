<?php
require_once "app.php";

// $rows = getAll('orders'); 
// foreach ($rows as $row) 
// {
// $order_city_id = $row['order_city_id'];
// $row = getOne('cities', "city_id = $order_city_id ");
// echo $row['city_name'];
   
// }

$rows = getAll('orders'); 
foreach ($rows as $row) 
{
  $order_service_id = $row['order_service_id'];
  $row = getOne('services', "service_id = $order_service_id ");
  echo $row['service_name'] ;
   
}


 


//  $table = "cities";
//   $cellname = "order_city_id";
//   $type_id = 'city_id';
//   function foreignKey($table , $cellname )
//   $cellname = $row["$cellname"];
// $row = getOne('$table', "$type_id = $cellname ");
// echo $row['city_name'];