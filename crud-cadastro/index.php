<!DOCTYPE html>
<html lang="pt-br">
<head>
	 <meta charset="UTF-8">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	 <title>Cadastro de Clientes</title>
</head>

<body>
	<div>
		<div class="container">
			<br>
			<h3 class="h3 mb-2 text-gray-800">Cadastro de Clientes</h3>
			<br><hr><br>
			<div class="card card-form">
				<div class="card-header">
					<h2>Clientes</h2>
					<button class="btn btn-info float-right" onclick="abreModal()"> + Novo cliente</button>
				</div>
				<div class="card-body">
					<div id="table" class="table"></div>
				</div>
        	</div>
		</div>

		<!-- MODAL DO CADASTRO -->
		<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-body">
	                    <form>
	                    	<h2 class="h2 mb-2 text-gray-800">Novo Cliente</h2>
	                    	<hr>

	                    	<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Nome</label>
									<div class="input-group mb-3">
									  <input type="text" class="form-control" id="nome" placeholder="Insira o nome aqui" required>
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

	                    	 <div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Sexo</label>

									<div class="input-group mb-3">
										<select class="form-control" id="sexo" required>
										<option selected disabled>Sexo</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>

									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

							<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Celular</label>
									<div class="input-group mb-3">
									  <input type="tel" class="form-control" id="celular" placeholder="Insira o número de celular aqui" required>
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

							<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
									<label for="basic-url">Email</label>
									<div class="input-group mb-3">
									  <input type="email" class="form-control" id="email" placeholder="Insira o email aqui" required>
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>
	                    </form>
	                    <p>&nbsp;</p>
	                    <div class="row">
	                    	<div class="col-md-1"></div>
	                    	<div class="col-md-10 text-right" style="">
	                    		<button class="btn btn-danger" onclick="fechaModal();">Cancelar</button>
	                    		<button class="btn btn-primary" onclick="cadastrar();">Cadastrar</button>
	                    	</div>
	                    	<div class="col-md-1"></div>
	             		</div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- MODAL PARA UPDATE -->
		<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-body">
	                    <form>
	                    	<h2 class="h2 mb-2 text-gray-800">Alterar cliente</h2>
	                    	<hr>

						 <input type="hidden" id="idUpdate" >

						 <div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Nome</label>
									<div class="input-group mb-3">
									  <input type="text" class="form-control" id="nomeUpdate" placeholder="Insira o nome aqui" required>
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

	                    	 <div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Sexo</label>

									<div class="input-group mb-3">
										<select class="form-control" id="sexoUpdate" required>
										<option selected disabled>Sexo</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>

									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

							<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Celular</label>
									<div class="input-group mb-3">
									  <input type="tel" class="form-control" id="celularUpdate" placeholder="Insira o número de celular aqui">
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>

							<div class="row">
	                    		<div class="col-md-1"></div>
	                    		<div class="col-md-10">
	                    			<label for="basic-url">Email</label>
									<div class="input-group mb-3">
									  <input type="email" class="form-control" id="emailUpdate" placeholder="Insira o email aqui">
									</div>
	                    		</div>
	                    		<div class="col-md-1"></div>
	                    	</div>
	                    </form>
	                    <p>&nbsp;</p>
	                    <div class="row">
	                    	<div class="col-md-1"></div>
	                    	<div class="col-md-10 text-right" style="">
	                    		<button class="btn btn-danger" onclick="fechaModal();">Cancelar</button>
	                    		<button class="btn btn-primary" onclick="update();">Alterar comentário</button>
	                    	</div>
	                    	<div class="col-md-1"></div>
	             		</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
<script src="js/index.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script>
    $('#celular').mask('(99) 99999-9999'),
	$('#celularUpdate').mask('(99) 99999-9999');
</script>