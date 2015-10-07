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

	<?php include("webparts/topo.php"); ?>

    <div class="container">
		<?php include("webparts/resultado_de_operacoes.php"); ?>

		 <h2> Contato </h1>
		 
		  <form id="form" class="form-horizontal" >
			<div class="form-group">
			  <label for="nome" class="col-sm-2 control-label">Nome</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control" id="nome" name="nome">
			  </div>
			</div>

			<div class="form-group">
			  <label for="email" class="col-sm-2 control-label">E-mail</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control" id="email" name="email">
			  </div>
			</div>

			<div class="form-group">
			  <label for="assunto" class="col-sm-2 control-label">Assunto</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control" id="assunto" name="assunto">
			  </div>
			</div>

			<div class="form-group">
			  <label for="mensagem" class="col-sm-2 control-label">Mensagem</label>
			  <div class="col-sm-3">
				<input type="text" class="form-control" id="mensagem" name="mensagem">
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