<?php 	

$host = 'ec2-54-246-121-32.eu-west-1.compute.amazonaws.com';
$port = 5432;
$username = "mokpbeftzvdfvj";
$password = "2109ff14725e43d77daf4a056fcfe7010c80984e391af2d15f9d1bb03cac80f2";
$dbname = "d65rlbivfarv6a";
  
  $connect = new mysqli($host, $username, $password, $dbname, $port);
//$connect = new mysqli($host, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed omar: " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
