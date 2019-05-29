<?php 	

$host = 'localhost';
$port = 3306;
$username = "root";
$password = "root";
$dbname = "stock";
// $host = 'mysql.hostinger.fr';
// $port = 3306;
// $username = "u293021064_root";
// $password = "uU0D7vpgbJoj";
// $dbname = "u293021064_stock";
// db connection
  
  $connect = new mysqli($host, $username, $password, $dbname, $port);
//$connect = new mysqli($host, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed omar: " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
