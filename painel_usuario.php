<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Bootstrap 101 Template</title>

  </head>
  <body>

	<?php include("webparts/header.php"); ?>

    <div class="container">

<?php
	if (isset($_SESSION['id_usuario'])) {
 ?>		
 
		 <h2> Painel do usuário </h1>
		 
		 <p>
		 	Olá <b> <?php echo $_SESSION["nome"]; ?> </b>, seja bem vindo ao seu painel de configurações 
		 </p>		
<?php
	} else {
	  include("webparts/div_voce_precisa_se_logar.php"); 
	}
?>		
		
    </div>

  </body>
</html>