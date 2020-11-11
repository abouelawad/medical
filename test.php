<?php require_once "app.php" ;


$files = glob(CORE . "*.php");


foreach ($files as $file ) {
  require_once $file;
}
// echo '<pre>';
// print_r(glob(CORE . "*.php"));
// echo '</pre>' ;
