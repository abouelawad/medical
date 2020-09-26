<?php require_once "../../app.php"; 


if(isset($_GET['order_id']) && is_numeric($_GET['order_id'])){
  $order_id = $_GET['order_id'];
  // $row = getOne('cities', 'order_id = "$order_id"');
  $isDeleted = deleteRow('orders', "order_id = '$order_id'");
  if (!$isDeleted)
    abort();
   else
   aredirect('order/view.php');
}


?>