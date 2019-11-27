<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $productName 		= $_POST['productName'];
  $productImage 	= $_POST['productImage'];
  $quantity 		= $_POST['quantity'];
  $barcode 			= $_POST['barCode'];
  $prixdAchat 		= $_POST['prixdAchat'];
  $prixdeVente 		= $_POST['prixdeVente'];
  $brandName 		= $_POST['brandName'];
  $categoryName 	= $_POST['categoryName'];
  $productStatus 	= $_POST['productStatus'];
  	if($productImage  == null || $productImage  == ''){			
		$sql = "INSERT INTO product (product_name, brand_id, categories_id, quantity, salePrice, barcode, active, prix_achat,status) 
		VALUES ('$productName', '$brandName', '$categoryName', '$quantity', '$prixdeVente', '$barcode' ,'$productStatus', '$prixdAchat',1)";

		if($connect->query($sql) === TRUE) {
			$valid['success'] = true;
			$valid['messages'] = "Successfully Added";	
		} else {
			$sqlFetch ="SELECT barcode FROM product where barcode = '$barcode'";
			$result = $connect->query($sqlFetch);
			$row = $result->fetch_array(); 
			if($row[0] == $barcode) {
				$valid['success'] = false;
				$valid['messages'] = "The product already excited";
			}else{
				$valid['success'] = false;
				$valid['messages'] = "Error while adding the product!!!";
			}
		}
  	}else{
  		$type = explode('.', $_FILES['productImage']['name']);
		$type = $type[count($type)-1];		
		$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
		if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	  		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
	  			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {				
						$sql = "INSERT INTO product (product_name, product_image, brand_id, categories_id, quantity, salePrice, barcode, active, prix_achat,status) 
						VALUES ('$productName', '$url', '$brandName', '$categoryName', '$quantity', '$prixdeVente', '$barcode' ,'$productStatus', '$prixdAchat',1)";
						if($connect->query($sql) === TRUE) {
							$valid['success'] = true;
							$valid['messages'] = "Successfully Added";	
						} else {
							$sqlFetch ="SELECT barcode FROM product where barcode = '$barcode'";
							$result = $connect->query($sqlFetch);
							$row = $result->fetch_array(); 
							if($row[0] == $barcode) {
								$valid['success'] = false;
								$valid['messages'] = "The product already excited";
							}else{
								$valid['success'] = false;
								$valid['messages'] = "Error while adding the product!!!";
							}
						}
				} // if
			} // if in_array 
		}			
  	}
	$connect->close();
	echo json_encode($valid);
 
} // /if $_POST