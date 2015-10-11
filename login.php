<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
      		
      		<style>
			.login-box {
				width: 50%;
				margin: auto;
				border-left-style: solid;
				border-right-style: solid;
				border-bottom-style: solid;
				border-width: 1px;
			    border-color: #bfbcbc;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				border-radius: 5px;

			}
			.login-title{
				margin: 0;
				padding: 0;
				font-size: 24px;
				color: #696969;
			}
			.login-header {
				padding-top: 4%;
				padding-bottom: 4%;
				border-top: solid;
				border-bottom: solid;
				border-color: #bfbcbc;
				border-width: 1px;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
				background-color: #e5e5e5;
				-webkit-border-top-left-radius: 5px;
				-webkit-border-top-right-radius: 5px;
				-moz-border-radius-topleft: 5px;
				-moz-border-radius-topright: 5px;
				border-top-left-radius: 5px;
				border-top-right-radius: 5px;

			}
			.login-main {
				width: 60%;
				margin: auto;
				padding-top: 6%;
				padding-bottom: 4%;
			}
			.inputs-login {
				width: 100%
			}
			#login-ou {
				text-align: center;
				padding-top: 4%;
				padding-bottom: 1%;
				color: #696969;
   			}
			</style>

   <title>Quebra-Galho</title>


   <script type="text/javascript">

	$(function() {
		$(form).submit(function() {
		   	$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        url: 'backend/login.php',
		        data: $(form).serialize(),
		        success : function(result) {
		        	if(result == "true") {
		        		window.location.href = "painel_usuario_usuario.php";
		        	}
		        	else {
		        		mostraResultadoOperacoes(false, "Ops... Aconteceu algum problema, talvez você tenha digitado sua senha incorretamente.");
		        	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
		        	mostraResultadoOperacoes(false, "Ops... Aconteceu um erro inesperado, tente entrar mais tarde...");
			       //alert("error! status:  " + textStatus);
			    }
		    });

		    return false; // avoid to execute the actual submit of the form.
		});	 	
	});



	</script>

  </head>
  <body>

	<?php include("webparts/topo.php"); ?>

    <div class="container">
    	<div class="login-box">
			<?php include("webparts/resultado_de_operacoes.php"); ?>
			<div class="login-header">
				<h2 class="login-title"> Entre no Quebra-Galho </h2>
			</div>
				<div class="login-main">			 
					  <form id="form" class="form-horizontal" >
						<div class="form-group">
							<input placeholder="E-mail" type="text" class="form-control inputs-login" id="email" name="email">
						</div>

						<div class="form-group">
						   <input placeholder="Senha" type="password" class="form-control inputs-login" id="senha" name="senha">
						</div>

						 
						<div class="form-group">
						  <div class="">
							<button type="submit" class="btn btn-primary btn-block">Entrar</button>

						<p id="login-ou">OU</p>

						<a class="btn btn-warning btn-block" href="novo_usuario.php" role="button">Cadastre-se</a>
							  </div>
							</div>
						  </form>


				</div>
			</div>

			<?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>

  </body>
</html>