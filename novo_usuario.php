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
				
			   	$.ajax({
				        type : 'POST',
				        dataType : 'text',
				        data: $(form).serialize(),
				        url: 'backend/usuario_novo.php',
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
		window.location.href = "painel_usuario_usuario.php";
	}
	
	</script>

  </head>
  <body>

	

<?php include("webparts/topo.php"); ?>

    <div class="container">

    <?php include("webparts/resultado_de_operacoes.php"); ?>

    	<div class="form-box">
			<?php include("webparts/resultado_de_operacoes.php"); ?>
			<div class="form-box-header">
				<h2 class="form-box-title"> Inscreva-se no Quebra-Galho </h2>
			</div>
				<div class="form-box-main">			
					<p> Cadastre-se para contratar ou oferecer um serviço:</p> 
					<form id="form" method="get" action="" class="form-horizontal">
					
						<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" >
				   		<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" >
				   		<input type="password" class="form-control" id="senha_conf" name="senha_conf" placeholder="Confirme sua senha">
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
						<input type="text" class="form-control" id="input_idade" name="idade" placeholder="Sua idade">
						
			   			<div class="cadastro-usuario-div-sexo">
							<p> <b>Sexo:</b> </p>
							<input type="radio" id="sexo-M" value="m" name="sexo">
				   			<label for="sexo-M" class="control-label" style="font-weight:normal;">Masculino </label>
				   			<input type="radio" id="sexo-F" value="f" name="sexo">
				   			<label for="sexo-F" class="control-label" style="font-weight:normal;">Feminino</label>
			   			</div>
						


						<!-- campo foto (nao deletar) 
						<div id="cropContainerMinimal" class="div_crop_foto_usuario"></div>	
						-->
						 
						<!-- <input class="submit" type="submit" value="Submit">-->
						<button type="submit" class="btn btn-warning btn-block">Cadastre-se</button>
					
				  	</form>


				</div>
			</div>

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