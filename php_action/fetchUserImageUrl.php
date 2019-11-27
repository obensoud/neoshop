
<?php 	

require_once 'core.php';
$userVal = $_POST['NomUserVal'];

if ($_POST['NomUserVal'] != ''){
	$sql = "SELECT user_id, user_image FROM users WHERE username = '$userVal'  " ;
	$result = $connect->query($sql);

	if($result->num_rows > 0) { 
	 $row = $result->fetch_array();
	} // if num_rows
}
$connect->close();

echo json_encode($row);