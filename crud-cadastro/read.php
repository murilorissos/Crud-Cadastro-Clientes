<table width="100%" cellspacing="0" border="1">
	<thead class="thead-dark">
	<tr class="colunas" align="center">
		<th>Nome</th>
		<th>Sexo</th>
		<th>Celular</th>
		<th>Email</th>
		<th>Alterar</th>
		<th>Excluir</th>
	</tr>
	</thead>

<?php

include("conexao.php");

$sql = "SELECT * FROM clientes ORDER BY created DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
   ?>
		<tr class="colunas" align="center">

			<th><?php echo $row['nome'] ?></th>

			<th><?php echo $row['sexo'] ?></th>

			<th><?php echo $row['celular'] ?></th>

			<th><?php echo $row['email'] ?></th>

			<th>
				<button class="btn btn-primary" onclick="modal_update(<?php echo $row['id'] ?>);">
					Alterar
				</button>
			</th>
			<th>
				<button class="btn btn-danger" onclick="delete_confirmation(<?php echo $row['id'] ?>);">
					Excluir
				</button>
			</th>
		</tr>
	<?php

    }
} else {
?>
	<tr class="colunas">
		<th colspan="5" style="text-align: center;"><br>Não há registros ainda!</th>
	</tr>
<?php
	}
?>
</table>