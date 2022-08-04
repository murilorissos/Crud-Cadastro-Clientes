<?php
	include("conexao.php");

	// Cria as variáveis com os posts enviados
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$celular = $_POST['celular'];
	$email = $_POST['email'];

	$sql = "update clientes SET
	nome = '$nome',
	sexo = '$sexo',
	celular = '$celular',
	email = '$email'
	where id = $id";

	$result = mysqli_query($conn, $sql);

	// Valida se as informações foram enviadas com sucesso
	if($result){
		echo true;
	}else{
		echo false;
	}
?>