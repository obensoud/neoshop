<?php 	

$host = 'w1kr9ijlozl9l79i.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$port = 3306;
$username = "h5r8upi4bs3lpgf8";
$password = "qlfnr47pvpus6vj2";
$dbname = "uye9fh6dtqylojq2";
  $connect = new mysqli($host, $username, $password, $dbname, $port);
//$connect = new mysqli($host, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
