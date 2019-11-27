<?php 

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$username = $_POST['username'];
	$userId = $_POST['user_id'];
	$_SESSION['language'] =  $_POST['langue'];
	$langue =  $_POST['langue'];

	$sql = "UPDATE users SET username = '$username', language = '$langue'  WHERE user_id = {$userId}";
	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating User info";
	}

	$connect->close();

	echo json_encode($valid);

}

?>