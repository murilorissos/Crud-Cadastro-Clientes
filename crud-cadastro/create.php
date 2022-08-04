<?php
	include("conexao.php");

	// Cria as variáveis com os posts enviados
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$celular = $_POST['celular'];
	$email = $_POST['email'];

	$data = new DateTime();
	$created = $data->format('Y-m-d H:i:s');

	$sql = "insert into clientes values(NULL,'$nome','$sexo','$celular','$email','$created')";
	$result = mysqli_query($conn, $sql);

	// Valida as informações
	if($result){
		echo true;
	}else{
		echo 'Erro ao cadastrar';
	}
?>