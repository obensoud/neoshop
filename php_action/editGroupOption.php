<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$editGroupOptionName = $_POST['editGroupOptionName'];
	$option_id = $_POST['editOptionName'];
	$brandStatus = $_POST['editBrandStatus']; 
	$brandId = $_POST['brandId'];

	$sql = "UPDATE group_option SET groupe_option_name = '$editGroupOptionName', option_id = $option_id, groupe_option_active = $brandStatus WHERE groupe_option_id = $brandId";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);

} // /if $_POST