<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$productName 		= $_POST['editProductName']; 
	$quantity 			= $_POST['editQuantity'];
	$brandName 			= $_POST['editBrandName'];
	$categoryName 	= $_POST['editCategoryName'];
	$productStatus 	= $_POST['editProductStatus'];

				
	$sql = "UPDATE users SET username = '$productName', profil_id = '$brandName', option_id = '$categoryName', email = '$quantity', user_active = '$productStatus', user_status = 1 WHERE user_id = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
