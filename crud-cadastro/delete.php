<?php
	include("conexao.php");

	$id = $_POST['id'];

	$sql = "delete from clientes where id = $id";
	$result = mysqli_query($conn, $sql);

	if($result){
		echo true;
	}else{
		echo false;
	}
?>