<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$profilName = $_POST['profilName'];
    $profilStatus = $_POST['profilStatus']; 

	$sql = "INSERT INTO profil_user (profil_name, profil_active, profil_status) VALUES ('$profilName', '$profilStatus', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
		$valid['profil Name'] = $profilName ;
		$valid['profil Status'] = $profilStatus;
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the profil";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST