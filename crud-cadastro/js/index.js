
		window.onload = initPage;

		function initPage(){
			read_data();
		}

		function read_data() {
			$( '#table' ).load( 'read.php' );
		}
		function abreModal() {
			$('input, textarea').val('');
			$('#modalInsert').modal('show');
		}
		function abreModalUpdate() {
			$('input, textarea').val('');
			$('#modalUpdate').modal('show');
		}
		function fechaModal() {
			$('#modalInsert').modal('hide');
			$('#modalUpdate').modal('hide');
            $('#sexo').prop('selectedIndex',0);
		}

		function cadastrar() {

			// Pega os valores
	        var nome = $('#nome').val();
	        var sexo = $('#sexo').val();
            var email = $('#email').val();
            var celular = $('#celular').val();

			// Faz o post
	        $.post('create.php', {
	            nome:nome,
	            sexo:sexo,
                email:email,
                celular:celular
	        },
	        function(resposta){
	            // Valida a resposta
	            if(resposta == 1){
	                //Limpa os inputs
	                alert_success('Cadastro realizado com sucesso!');
	                fechaModal();
	                read_data();
                    $('#sexo').prop('selectedIndex',0);
	            }else {
	                alert_error(resposta);
	                read_data();
	            }
	        });
		}

		function delete_confirmation(id){
			Swal.fire({
			  title: 'Você tem certeza que deseja excluir?',
			  text: "Isso não poderá ser desfeito no futuro",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  cancelButtonText: 'Cancelar',
			  confirmButtonText: 'Sim, excluir isso!'
			})
			.then((result) => {
			  if (result.value) {
			    $.post('delete.php', {
	            	id:id
	            },
		        function(resposta){
		            // Valida a resposta
		            if(resposta == 1){
		                alert_success('Excluido com sucesso!');
		                read_data();
		            }else {
		                alert_error('Ocorreu um erro ao excluir!');
		                read_data();
		            }
		        });
			  }
			})
		}

		function modal_update(id){

				abreModalUpdate();
				var parametros = {
					id:id
				};
			$.ajax({
			     url : "update.php",
			     type : 'post',
			     dataType: 'JSON',
			     data : parametros,
			     beforeSend : function(){
			        //alert("Buscando dados...");
			     }
			})
			.done(function(json){

                $('#idUpdate').val(json.id);
				$('#nomeUpdate').val(json.nome);
                $('#sexoUpdate').val(json.sexo);
				$('#emailUpdate').val(json.email);
                $('#celularUpdate').val(json.celular);
			})
			.fail(function(jqXHR, textStatus, msg){
			    alert(msg);
			});
		}

		function update() {

			// Pega os valores
			var parametros = {
				id : $('#idUpdate').val(),
	        	nome : $('#nomeUpdate').val(),
                sexo : $('#sexoUpdate').val(),
                email : $('#emailUpdate').val(),
                celular : $('#celularUpdate').val()

				};

			$.ajax({
		    	url : "update2.php",
		        type : 'post',
		   	    dataType: 'html',
		   	    data : parametros,
		    	beforeSend : function(){
		     		//alert("alterando comentario....");
		     	}
			})
			.done(function(resposta){
				fechaModal();
				read_data();
				if(resposta != null){
					alert_success("O comentario foi alterado com sucesso!");
				}else{
					alert_error("Ocorreu um erro ao alterar seu comentario!");
				}
			})
			.fail(function(jqXHR, textStatus, msg){
				alert_error("Ocorreu o seguinte erro na chamada Ajax: "+msg);
			});
		}

		function alert_error(mensagem){
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: mensagem
			})
		}

		function alert_success(mensagem){
			Swal.fire({
				icon: 'success',
				title: 'Sucesso',
				text: mensagem
			})
		}