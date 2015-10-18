<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$pAnt = isset($_GET['pAnt']) ? trim($_GET['pAnt']) : "";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
      	

   <title>Quebra-Galho</title>


   <script type="text/javascript">

	$(function() {
		<?php if($pAnt != "") { ?>
			$('#modal_acesso_nao_permitido').modal('toggle');
		<?php } ?>

		$(form).submit(function() {
		   	$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        url: 'backend/login.php',
		        data: $(form).serialize(),
		        success : function(result) {
		        	if(result == "true") {
		        		<?php if($pAnt == "") { ?>
							window.location.href = "painel_usuario_usuario.php";
						<?php } else { ?>
							window.location.href = "<?php echo $pAnt; ?>";
		        		<?php }  ?>
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
    	<div class="row row-centered">
	    	<div class="form-box col-xs-12 col-sm-4 col-md-4 col-centered">
				<?php include("webparts/resultado_de_operacoes.php"); ?>
				<div class="form-box-header">
					<h2 class="form-box-title"> Entre no Quebra-Galho </h2>
				</div>
					<div class="form-box-main">			 
						<form id="form" class="form-horizontal" >

							<input placeholder="E-mail" type="text" class="form-control" id="email" name="email">
							
							<input placeholder="Senha" type="password" class="form-control" id="senha" name="senha">
							
							<div class="esqueceu-senha">
								<a  href="contato.php" role="button">Esqueceu sua senha? </a>
							</div>

							<button type="submit" class="btn btn-primary btn-block">Entrar</button>

							<p class="ou"> ou </p>

							<a class="btn btn-warning btn-block" href="novo_usuario.php" role="button">Cadastre-se</a>
								  
						</form>
					</div>
				</div>
			</div>

			<?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>

  </body>
</html>