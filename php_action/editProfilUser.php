<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$brandName = $_POST['editBrandName'];
  $brandStatus = $_POST['editBrandStatus']; 
  $brandId = $_POST['brandId'];

	$sql = "UPDATE profil_user SET profil_name = '$brandName', profil_active = '$brandStatus' WHERE profil_id = '$brandId'";

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