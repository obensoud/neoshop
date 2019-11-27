<?php 	

require_once 'core.php';

$brandId = $_POST['brandId'];

$sql = "SELECT option_id, option_name, option_active, option_status FROM option_user WHERE option_id = $brandId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);