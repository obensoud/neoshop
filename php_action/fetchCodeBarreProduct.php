<?php 	

require_once 'core.php';
$barCodeScanner = $_POST['barCodeScannerVal'];
$percentage = "%";

if ($_POST['barCodeScannerVal'] != ''){
	$barCodeScanner =$percentage.$barCodeScanner.$percentage;
	$sql = "SELECT product_name, salePrice, barcode, product_id FROM product WHERE (barcode like '$barCodeScanner' or product_name like '$barCodeScanner') and (active <> 2 and status <> 2) " ;
	$result = $connect->query($sql);

	if($result->num_rows > 0) { 
	 $row = $result->fetch_array();
	} // if num_rows
}
$connect->close();

echo json_encode($row);