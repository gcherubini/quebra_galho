<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Quebra-Galho</title>

   <script type="text/javascript"> 
   
 	$(document).ready(function () {
 		ativaMenuPainelUsuario("#painel_menu_usuario");

 	});

 	</script>
  </head>
  <body>

		<?php include("webparts/topo.php"); ?>

	    <div class="container">

	    <?php include("webparts/resultado_de_operacoes.php"); ?>

	<?php
		if (isset($_SESSION['id_usuario'])) {
	 ?>		

	 		<?php include("webparts/painel_usuario_menu.php"); ?>

	 		<div class="painel_usuario_main">

				<h3> Painel do usuário </h3>
				 
				<p>
				 	Olá <b> <?php echo $_SESSION["nome"]; ?> </b>, seja bem vindo ao seu painel de configurações 
				</p>

			</div>
	<?php
		} else {
		  include("webparts/div_voce_precisa_se_logar.php"); 
		}
	?>		
						
				<?php include("webparts/pagina_nao_encontrada.php"); ?>
	    </div>

	     <?php include("webparts/rodape.php"); ?>

  </body>
</html>