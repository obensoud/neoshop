<?php 	

$host = 'localhost';
$port = 3306;
$username = "root";
$password = "root";
$dbname = "stock";
  
  $connect = new mysqli($host, $username, $password, $dbname, $port);
//$connect = new mysqli($host, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
