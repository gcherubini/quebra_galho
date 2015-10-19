<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Quebra-Galho</title>

  </head>
  <body>
  	<div class="page">

		<?php include("webparts/topo.php"); ?>

	    <div class="container content">

			<?php include("webparts/resultado_de_operacoes.php"); ?>

			<div class="row row-centered">
		    	<div class="form-box  col-xs-12 col-sm-4 col-md-4 col-centered">
		    		<div class="form-box-header">
						 <h2 class="form-box-title"> Entre em contato conosco </h2>
					</div>
						 	<div class="form-box-main">	
								  <form id="form" class="form-horizontal" >

										<input placeholder="Nome e Sobrenome" type="text" class="form-control" id="nome" name="nome">

										<input placeholder="E-mail" type="text" class="form-control" id="email" name="email">

										<input placeholder="Assunto" type="text" class="form-control" id="assunto" name="assunto">

										<textarea placeholder="Mensagem..." class="form-control" rows="3" id="mensagem" name="mensagem"></textarea>

										<button type="submit" class="btn btn-primary btn-block">Enviar</button>

								  </form>
							</div>	  
				</div>
			</div>		  
			  
			   <?php include("webparts/pagina_nao_encontrada.php"); ?>
	    </div>

	    <?php include("webparts/rodape.php"); ?>
	   </div>
  </body>
</html>