<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$optionName = $_POST['brandName'];
  	$optionStatus = $_POST['brandStatus']; 
  	$editCategoryName = $_POST['editCategoryName']; 

	$sql = "INSERT INTO group_option (groupe_option_name, option_id, groupe_option_active, groupe_option_status) VALUES ('$optionName', '$editCategoryName','$optionStatus', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST