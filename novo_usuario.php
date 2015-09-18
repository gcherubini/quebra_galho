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
					required: "Por favor nos diga sua idade"
				}
			}
		});	
	});

	$.validator.setDefaults({
			submitHandler: function() {
				
			   	$.ajax({
				        type : 'POST',
				        dataType : 'text',
				        data: $(form).serialize(),
				        url: 'backend/novo_usuario.php',
				        success : function(result) {
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
		alert(erroMsg);
		//$(form)[0].reset();
		//alert(error);
	}

	function sucessoSalvarDB(error){
		alert(sucessoMsg);
		window.location.href = "painel_usuario.php";
	}
	
	</script>

  </head>
  <body>

	

<?php include("webparts/topo.php"); ?>

    <div class="container">

    <?php include("webparts/resultado_de_operacoes.php"); ?>

		<h2> Inscrever-se </h1>
		<p> Se cadastre no nosso website para poder contratar ou oferecer um serviço: </p> 

		<form id="form" method="get" action="" class="form-horizontal">
			<fieldset>
				<div class="row">
					  <div class="col-sm-12">
					  		<div class="col-sm-2">
					  			<label for="email" class="control-label">E-mail</label>
					  		</div>
					  		 <div class="col-sm-10">	
						   		<input type="email" class="form-control" id="email" name="email" >
							</div>
					   </div>
					   
				</div>

				<div class="row">
					  <div class="col-sm-6">
					  		<div class="col-sm-4">
					  			<label for="senha" class="control-label">Senha</label>
					  		</div>
					  		 <div class="col-sm-8">	
						   		<input type="password" class="form-control" id="senha" name="senha" >
							</div>
					   </div>
					   <div class="col-sm-6">
					   		<div class="col-sm-4">
					  			<label for="senha_conf" class="control-label">Confirmação</label>
					  		</div>
					  		 <div class="col-sm-8">	
						   		<input type="password" class="form-control" id="senha_conf" name="senha_conf" >
							</div>
					  </div>
				</div>

				<div class="row">
					  <div class="col-sm-12">
					  		<div class="col-sm-2">
					  			<label for="nome" class="control-label">Nome</label>
					  		</div>
					  		 <div class="col-sm-10">	
						   		<input type="text" class="form-control" id="nome" name="nome" >
							</div>
					   </div>
					   
				</div>

				<div class="row">		  
					  <div class="col-sm-6">
					  		<div class="col-sm-4">
					  			<label for="input_idade" class="control-label">Idade</label>
					  		</div>
					  		 <div class="col-sm-8">	
						   		<input type="text" class="form-control" id="input_idade" name="idade">
							</div>
					  </div>
					   <div class="col-sm-6">
					   		<div class="col-sm-4">
					  			<label for="input_sexo" class="control-label">Sexo</label>
					  		</div>
					  		 <div class="col-sm-8">	 		
						   			<input type="radio" id="sexo-M" value="m" name="sexo">
						   			<label for="sexo-M" class="control-label" style="font-weight:normal;">Masculino </label>
						   			<input type="radio" id="sexo-F" value="f" name="sexo">
						   			<label for="sexo-F" class="control-label" style="font-weight:normal;">Feminino</label>
							</div>	   		
					  </div>
				</div>

				<!-- <p class="centered" style="float:left; margin-left:20px;"> Envie uma foto sua profissional na qual <br> será visualizada em seus anúncios </p> -->
				<div class="row">		  
					  <div class="col-sm-6">
					  		<div class="col-sm-4">
					  			<label for="cropContainerMinimal" class="col-sm-2 control-label">Foto</label>
					  		</div>
					  		<div class="col-sm-8">	
						   		<div id="cropContainerMinimal" class="div_crop_foto_usuario"></div>					
							</div>	   	
					  </div>
				</div>
				 
				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-10">
					<!-- <button type="submit" class="btn btn-default">Publicar !</button> -->
					<input class="submit" type="submit" value="Submit">
				  </div>
				</div>	
			</fieldset>
		</form>

		 <?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>

    <script>
	
		var croppicContaineroutputMinimal = {
				uploadUrl:'libraries/croppic/img_save_to_file.php',
				cropUrl:'libraries/croppic/img_crop_to_file.php', 
				modal:false,
				doubleZoomControls:true,
				enableMousescroll:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContaineroutput = new Croppic('cropContainerMinimal', croppicContaineroutputMinimal);
		
		
	</script>
	
  </body>
</html>