<?php 	

$host = 'eu-cdbr-west-02.cleardb.net';
$port = 3306;
$username = "b4aaec588befa0";
$password = "c6622a34";
$dbname = "heroku_c308925211e9a24";
  
  $connect = new mysqli($host, $username, $password, $dbname, $port);
//$connect = new mysqli($host, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
