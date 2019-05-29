<?php 	

require_once 'core.php';

$sql = "SELECT product_id, product_name FROM product WHERE status = 1 AND active = 1 ORDER BY  product_name ASC ";
$result = $connect->query($sql);

while ($row = $result->fetch_assoc()) {
	$rows[] = $row;
}
$connect->close();

echo json_encode($rows);
