<?php 	
require_once 'core.php';

$Totalreceipt 		= $_POST['Totalreceipt'];
$NemberOfRow 		= $_POST['NemberOfRow'];
$myJSONProdactName 	= json_decode($_POST['myJSONProdactName']);
$myJSONBarCode	 	= json_decode($_POST['myJSONBarCode']);
$myJSONQuanty 		= json_decode($_POST['myJSONQuanty']);
$myJSONPrice 		= json_decode($_POST['myJSONPrice']);
$myJSONTotal 		= json_decode($_POST['myJSONTotal']);
$orderDate 	  		= date('Y-m-d', strtotime(date_default_timezone_get()));

$user_id      = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();
$clientName   = $result['username'];

$profil_id = $result['profil_id'];
$sql1 = "SELECT * FROM profil_user WHERE profil_id = {$profil_id}";
$query1 = $connect->query($sql1);
$result1 = $query1->fetch_assoc();
$clientProfil   =$result1['profil_name'];

$SubAmount = $Totalreceipt;
$TVA=0;
$sql2 = "INSERT INTO orders (order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, order_status) VALUES ('$orderDate','$clientName','$clientProfil','$SubAmount','$TVA', '$Totalreceipt' , '0','$Totalreceipt','$Totalreceipt','0','2',1,1)";

$order_id;
$orderStatus = false;
if($connect->query($sql2) === true) {
	$order_id = $connect->insert_id;
	$valid['order_id'] = $order_id;	
	$orderStatus = true;
}
$orderItemStatus = false;
for($x = 0; $x < $NemberOfRow-1; $x++) {	
  	$temp1 =  $myJSONBarCode[$x];
  	$temp2 = strval("\"");
	$updateProductQuantitySql = "SELECT quantity, product_id FROM product WHERE barcode = {$temp2}{$temp1}{$temp2}";
	$updateProductQuantityData = $connect->query($updateProductQuantitySql);
	while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $myJSONQuanty[$x];							
			// update product table
			$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE barcode = ".$temp2."".$temp1."".$temp2." ";
			$connect->query($updateProductTable);
			// add into order_item
			$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 
			VALUES ('$order_id', '".$updateProductQuantityResult[1]."', '".$myJSONQuanty[$x]."', '".$myJSONPrice[$x]."', '".$myJSONTotal[$x]."', 1)";
			$connect->query($orderItemSql);		
			if($x == count($_POST['productName'])) {
				$orderItemStatus = true;
			}		
	} // while
} // /for quantity
$valid['success'] = true;
$valid['messages'] = "Successfully Added";		
$connect->close();
echo json_encode($orderItemSql);