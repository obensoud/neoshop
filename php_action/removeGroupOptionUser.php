<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$brandId = $_POST['brandId'];

if($brandId) { 

 $sql = "UPDATE group_option SET groupe_option_status = 2 WHERE groupe_option_id = {$brandId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST