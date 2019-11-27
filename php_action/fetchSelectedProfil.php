<?php 	

require_once 'core.php';

$brandId = $_POST['brandId'];

$sql = "SELECT profil_id, profil_name, profil_active, profil_status FROM profil_user WHERE profil_id = $brandId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();
echo json_encode($row);