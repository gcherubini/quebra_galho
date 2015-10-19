<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Quebra-Galho</title>

	<?php include("webparts/head_imports.php"); ?>

	<script>

	var erroMsg = "Aconteceu um erro ao salvar seu usuário, tente mais tarde!";
 	var sucessoMsg = "Usuário salvo com sucesso, obrigado!";
 	
	$().ready(function() {
		$("#form").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				senha: {
					required: true,
					minlength: 6
				},
				senha_conf: {
					required: true,
					minlength: 6,
					equalTo: "#senha"
				},
				nome: {
					required: true
				},
				idade: {
					required: true,
					number: true,
					maxlength: 2
				},
				sexo: {
					required: true
				}
			},
			messages: {
				email: {
					required: "Por favor digite seu e-mail",
					email: "Por favor digite um e-mail válido"
				},
				senha: {
					required: "Por favor digite uma senha",
					minlength: "Sua senha tem que ter pelo menos 6 letras"
				},
				senha_conf: {
					required: "Por favor digite a confirmação da sua senha",
					minlength: "Sua senha tem que ter pelo menos 6 letras",
					equalTo: "As senhas não conferem"
				},
				nome: {
					required: "Por favor nos diga seu nome"
				},
				idade: {
					required: "Por favor digite sua idade",
					number: "Por favor, digite apenas números",
					maxlength: "Por favor digite sua idade de no máximo dois dígitos"
				},
				sexo: {
					required: "Por favor escolha seu sexo"
				}
			}
		});	
	});

	$.validator.setDefaults({
			submitHandler: function() {
			
				// Move cropped image data to hidden input
		        var imageData = $('.image-editor').cropit('export');
          		$('.hidden-image-data').val(imageData);

          		//console.log($('.hidden-image-data').val());
		         
			   	$.ajax({
				        type : 'POST',
				        dataType : 'text',
				        data: $('form').serialize(),
				        url: 'backend/usuario_novo.php',
				        success : function(result) {
				        	//alert(result)
				        	if(result == "") {
				        		sucessoSalvarDB(result);
				        	}
				        	else{
				        		erroSalvarDB(result);
				        	}
				        },
				        error: function(XMLHttpRequest, textStatus, errorThrown){
					        erroSalvarDB(textStatus);
					    }
				    });

			    return false; // avoid to execute the actual submit of the form.
				
			}
		});

	function erroSalvarDB(error){
		//alert(result)
		mostraResultadoOperacoes(false, "Ops... Aconteceu um erro inesperado, tente criar sua conta mais tarde...");
	}

	function sucessoSalvarDB(error){
		alert(sucessoMsg);
		window.location.href = "painel_usuario_usuario.php";
	}
	
	</script>

  </head>
  <body>
  	<div class="page">

	

		<?php include("webparts/topo.php"); ?>

	    <div class="container content">

	    <?php include("webparts/resultado_de_operacoes.php"); ?>

	    <div class="row row-centered">
	    	<div class="form-box  col-xs-12 col-sm-4 col-md-4 col-centered">
				<div class="form-box-header">
					<h2 class="form-box-title"> Inscreva-se no Quebra-Galho </h2>
				</div>
					<div class="form-box-main">			
						<p> Cadastre-se para contratar ou oferecer um serviço:</p> 
						<form id="form" method="POST" enctype="multipart/form-data" action="backend/usuario_novo.php" class="form-horizontal">

							<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
						
							<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" >
					   		<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" >
					   		<input type="password" class="form-control" id="senha_conf" name="senha_conf" placeholder="Confirme sua senha">
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
							<input type="text" class="form-control" id="idade" name="idade" placeholder="Sua idade">
							<!-- <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Seu perfil do Linkedin"> -->
							

							<div class="cadastro-usuario-div-sexo">
								<p> <b>Sexo:</b> </p>
								<input type="radio" id="sexo-M" value="m" name="sexo">
					   			<label for="sexo-M" class="control-label" style="font-weight:normal;">Masculino </label>
					   			<input type="radio" id="sexo-F" value="f" name="sexo">
					   			<label for="sexo-F" class="control-label" style="font-weight:normal;">Feminino</label>
				   			</div>
							
				   				

				   			<div class="image-editor">
				   				<p> <b>Foto profissional:</b> </p>

						        <input type="file" name="image" class="cropit-image-input form-control"> 
						         
						        <div class="cropit-image-preview"></div>
						        <div class="image-size-label">
						          Alterar tamanho da foto
						        </div>
						        <input type="range" class="cropit-image-zoom-input">
						        <input type="hidden" name="image-data" class="hidden-image-data" />
					      	</div>

							<button type="submit" class="btn btn-warning btn-block">Cadastre-se</button>
						
					  	</form>


					</div>
				</div>
			</div>

			 <?php include("webparts/pagina_nao_encontrada.php"); ?>
	    </div>

	    <?php include("webparts/rodape.php"); ?>

	    <script>
	      $(function() {
	        $('.image-editor').cropit();
	      });
	    </script>


	</div>
  </body>
</html>