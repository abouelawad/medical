<?php 

 $conn = mysqli_connect(DB_SERVER_NAME, DB_USER_NAME, DB_PASSWORD, DB_DATABASE);

// Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";


function getOne(string $table ,string $whereCase){
  global $conn;
  $sql = "SELECT * FROM $table  WHERE $whereCase LIMIT 1 ";
  // echo $sql;
  $result = mysqli_query($conn, $sql);
  // print_r($result);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
  
      $row = mysqli_fetch_assoc($result);
      
      return $row;
    
  } else
  { 
  return [];
  }

  mysqli_close($conn);

}

function getAll(string $table) {
  global $conn;
  $sql = "SELECT * FROM $table" ; 
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
      return mysqli_fetch_all($result , MYSQLI_ASSOC );
  } else
  { 
  return [];
  }
  mysqli_close($conn);
}
#checked..


// convert set of data to sql syntax 
function sqlingData(array $data)
{

  $keys =  "(" . implode(",", array_keys($data)) . ")";
  $values =   "('" . implode("','", array_values($data)) . "')";

 return $keys . 'Values' . $values;
}
#checked


function insert(string $table , array $data)
{
  global $conn;

  $sql = "INSERT INTO $table ". sqlingData($data);

  if (mysqli_query($conn, $sql)) {
    return true ;
  } else {
    return false ;
  }

  mysqli_close($conn);
}
#checked

function update(string $table, array $data, string $whereCase )
{
  global $conn;
  $set = '';
  foreach ($data as $key => $value) {
    $set.= "$key = '$value',";
    
  }
  $set = rtrim($set, ',');
  $sql = "UPDATE $table  SET $set WHERE $whereCase";
  // echo $sql;

  if (mysqli_query($conn, $sql)) {
    return true;
  } else {
    return false;
  }

  mysqli_close($conn);
}#checked



function deleteRow(string $table,string $whereCase)
{
  global $conn;
  $sql = "DELETE FROM  $table  WHERE $whereCase";
  return mysqli_query($conn, $sql) ;
  mysqli_close($conn);
}
#checked



function getCount(string $table)
{
  global $conn;
  $sql = "SELECT COUNT(*) AS rowsCount FROM $table  ";
  $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
  mysqli_close($conn);
}#checked

function getCountWhere(string $table , string $whereCase)
{
  global $conn;
  $sql = "SELECT COUNT(*) AS rowsCount FROM $table WHERE $whereCase ";
  // echo $sql;
  $result = mysqli_query($conn, $sql);
  // print_r($result);
  $row = mysqli_fetch_assoc($result);
  return $row['rowsCount'];
  mysqli_close($conn);
}