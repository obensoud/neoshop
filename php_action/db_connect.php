<?php 	

$host = 'ec2-176-34-184-174.eu-west-1.compute.amazonaws.com';
$port = 5432;
$username = "kvdnxvnmkwgtmh";
$password = "37cd4d03bd4bb71a90b1d4df7f7fe6a175923c4df89baa03b0078152f6fd9c15";
$dbname = "d4bsd5rvsqtl7n";
  
  $connect = new mysqli($host, $username, $password, $dbname, $port);
//$connect = new mysqli($host, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed omar: " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
