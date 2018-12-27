<?php 
	include 'connect_db.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM product WHERE id = $id";
	if (mysqli_query($conn, $sql) === TRUE) {
		header("Location: list_product.php");
	}
?>