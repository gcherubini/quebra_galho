<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
//mudar pra post...

$id_usuario = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : 0;
$id_servico = isset($_POST['id_servico']) ? trim($_POST['id_servico']) : 0;
echo "<script> var id_servico = $id_servico; </script>";
echo "<script> var id_usuario = $id_usuario; </script>";
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
        
      	<div class="voce_precisa_estar_logado">
  		 	<h2> Acesso requisitado </h2>

  			<p> Você ainda ainda não entrou com seu cadastro... </p>
  			<p> Caso não tenha ainda um cadastro ou deseja logar com o mesmo, acesse os links abaixo: </p>
  			<a href="novo_usuario.php"> Novo Cadastro </a> ou 
  			<a href="login.php"> Faça seu login </a>
  		</div>
      </div>

      <?php include("webparts/rodape.php"); ?>
    </div>
  </body>
</html>