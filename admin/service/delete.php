<?php require_once "../../app.php"; 


if(isset($_GET['service_id']) && is_numeric($_GET['service_id'])){
  $service_id = $_GET['service_id'];
  $isDeleted = deleteRow('services', "service_id = '$service_id'");
  if (!$isDeleted)
    abort();
   else
   aredirect('service/view.php');
}
 

?>