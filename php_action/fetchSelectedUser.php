<?php 	

require_once 'core.php';

$productId = $_POST['productId'];

$sql = "SELECT user_id, username, user_image, password, email, option_id, profil_id, user_active, user_status FROM users WHERE user_id = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);