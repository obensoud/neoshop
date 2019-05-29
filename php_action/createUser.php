<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$CollaboratorName 		= $_POST['CollaboratorName']; // collaborator name
	$productImage 	= $_POST['productImage']; // Avatar
	$Password 			= md5($_POST['Password']); // password
	$ConfirmYourPassword 	= md5($_POST['ConfirmYourPassword']); //password
	$Email 			= $_POST['Email']; // email
	$Profil 			= $_POST['Profil'];// profil
	$OptionName 	= $_POST['OptionName']; // option
	$productStatus 	= $_POST['productStatus']; //Status

  $type = explode('.', $_FILES['productImage']['name']);
  $type = $type[count($type)-1];		
  $url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
  if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
  	if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
  		if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
  			if(strcmp($Password,$ConfirmYourPassword) == 0) {
	  			$sql = "INSERT INTO users (username, user_image, profil_id, option_id, email, password, user_active, user_status) 
	  			VALUES ('$CollaboratorName', '$url', '$Profil', '$OptionName', '$Email', '$Password' ,'$productStatus', 1)";

	  			if($connect->query($sql) === TRUE) {
	  				$valid['success'] = true;
	  				$valid['messages'] = "Successfully Added";	
	  			} else {
	  				$valid['success'] = false;
	  				$valid['messages'] = "Error while adding the members";
	  			}
	  		} else {
				$valid['success'] = false;
				$valid['messages'] = "New password does not match with Conform password";
			}
  		}	else {
  			return false;
			}	// /else	
		} // if
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);

} // /if $_POST