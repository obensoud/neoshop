<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$productName 		= $_POST['editProductName']; 
	$barCode 			= $_POST['editbarCode']; 
	$quantity 			= $_POST['editQuantity'];
	$prixDAchat 		= $_POST['editPrixDAchat'];
	$prixDeVente 		= $_POST['editPrixDeVente'];
	$brandName 			= $_POST['editBrandName'];
	$categoryName 		= $_POST['editCategoryName'];
	$productStatus 		= $_POST['editProductStatus'];

				
	$sql = "UPDATE product SET product_name = '$productName',barcode = '$barCode', brand_id = '$brandName', categories_id = '$categoryName', quantity = '$quantity', prix_achat= '$prixDAchat',salePrice = '$prixDeVente', active = '$productStatus', status = 1 WHERE product_id = $productId ";

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
 
