<?php
	include("conexao.php");

	// Cria as variáveis com os posts enviados

	$id = $_POST['id'];

	$sql = "select * from clientes where id = $id";

	$result = mysqli_query($conn, $sql);

	if($result){
		$json = array();

		$row = mysqli_fetch_assoc($result);

		$json['id'] = $id;
		$json['nome'] = $row['nome'];
		$json['sexo'] = $row['sexo'];
		$json['celular'] = $row['celular'];
		$json['email'] = $row['email'];

		echo json_encode($json);

	}else{
		echo false;
	}
?>