<?php 	

require_once 'core.php';

$brandId = $_POST['brandId'];

$sql = "SELECT groupe_option_id, groupe_option_name, option_id, groupe_option_active, groupe_option_status FROM group_option WHERE groupe_option_id = $brandId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);