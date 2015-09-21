<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
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
		        		window.location.href = "painel_usuario.php";
		        	}
		        	else {
		        		alert("Erro de conexão. Talvez você tenha digitado sua senha errada...")
		        	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			       alert("Aconteceu um erro inesperado, tente mais tarde...")
			       alert("error! status:  " + textStatus);
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
		<?php include("webparts/resultado_de_operacoes.php"); ?>

		 <h2> Entre no Quebra-Galho </h1>
		 
		  <form id="form" class="form-horizontal" >
			<div class="form-group">
			  <label for="email" class="col-sm-2 control-label">E-mail</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control" id="email" name="email">
			  </div>
			</div>

			<div class="form-group">
			  <label for="senha" class="col-sm-2 control-label">Senha</label>
			  <div class="col-sm-3">
			   <input type="password" class="form-control" id="senha" name="senha">
			  </div>
			</div>

			 
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Entrar</button>
			  </div>
			</div>
		  </form>
		  
		   <?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>

  </body>
</html>