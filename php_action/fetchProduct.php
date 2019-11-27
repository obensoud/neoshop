<?php 	
require_once 'core.php';
require_once 'localisationIn.php';
$sql = "SELECT product.product_id, product.product_name,  product.product_image, product.brand_id,
 		product.categories_id, product.quantity, product.salePrice,  product.active, product.status, 
 		brands.brand_name, categories.categories_name, product.barcode FROM product 
		INNER JOIN brands ON product.brand_id = brands.brand_id 
		INNER JOIN categories ON product.categories_id = categories.categories_id  
		WHERE product.status = 1";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$productId = $row[0];
 	// active 
 	if($row[7] == 1) {
 		// activate member
 		$active = "<label class='label label-success'>Available</label>";
 	} else {
 		// deactivate member
 		$active = "<label class='label label-danger'>Not Available</label>";
 	} // /else
	$userId = $_SESSION['userId'];
	$sql = "SELECT profil_id FROM users WHERE user_id = '$userId'";
	$resultProfil = $connect->query($sql);
	$rowProfil = $resultProfil->fetch_array();
	error_log ('profil debug: '.$rowProfil[0]);
	$button;
	if($rowProfil[0] == 13 || $rowProfil[0] == 14 ){
		$button = '<!-- Single button -->
		<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i>'.tr("Edit").'</a></li>
			<li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> '.tr("remove").'</a></li>       
		</ul>
		</div>';
	}else{
		$button = '<!-- Single button -->
		<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle"  disabled="disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Action <span class="caret"></span>
		</button>
		<ul class="dropdown-menu">     
		</ul>
		</div>';
	}
 	

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

	$brand = $row[9];
	$category = $row[10];

	$imageUrl = substr($row[2], 3);
	$productImage = "<img class='img-round' src='".$imageUrl."' style='height:30px; width:50px;'  />";

 	$output['data'][] = array( 		
 		// image
 		$productImage,
 		// product name
 		$row[1], 
 		// product name
 		$row[11], 
 		// rate
 		$row[6],
 		// quantity 
 		$row[5], 		 	
 		// brand
 		$brand,
 		// category 		
 		$category,
 		// active
 		$active,
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);