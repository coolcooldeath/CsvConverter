<?php
  $hostname = "127.0.0.1";
  $username = "root";
  $password = "";
  $dbname = "csv_converter_db";
ini_set('error_reporting', E_ALL);
if (isset($hostname)) {
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
}
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
