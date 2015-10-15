<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION['id_usuario'])){
	$fileName = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	header("location: login.php?pAnt=" . $fileName);
	exit;
}
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

	$().ready(function() {


	    $('#clicker').click(function() {
	        $('.painel_usuario_main input').each(function() {
	            if ($(this).attr('disabled')) {
	                $(this).removeAttr('disabled');
	            }
	            else {
	                $(this).attr({
	                    'disabled': 'disabled'
	                });
	            }
	        });
	    });
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
						Olá <b> <?php echo $_SESSION["nome"]; ?></b>, seja bem-vindo(a) ao seu painel de configurações.
					</p>

					<p>
						Aqui você encontra um resumo sobre o seu perfil, onde pode modificar algumas informações pessoais e configurações da sua conta.
					</p>

				<h4> MEU PERFIL </h4>

					<p>
						Nome: <?php echo $_SESSION["nome"]; ?>
					</p>

					<p>
						E-mail: <input type='text' disabled></input>
					</p>

					<p>
						Senha: <input type='password' disabled></input>
					</p>

					<p>
						Telefone: <input type='text' disabled></input>
					</p>

					<p>
						Endereço: <input type='text' disabled></input>
					</p>

					<div id='clicker' class="btn btn-default">Editar</div>

					<div class="btn btn-default">Salvar</div>

				<h4> MINHAS AVALIAÇÕES </h4>

					<p>
						Você possui X avaliações.
					</p>

					<p>
						Sua reputação atual é X.
					</p>

					<p>
						Você possui X avaliações.
					</p>

					<p>
						<a href="#">Ver minhas avaliações</a>
					</p>

				<h4> MEUS ANÚNCIOS </h4>

					<p>
						Você possui X anúncios cadastrados.
					</p>

					<p>
						<a href="#">Ver meus anúncios</a> - <a href="#">Promova agora o seu anúncio!</a>
					</p>

				<h4> MINHAS NEGOCIAÇÕES </h4>

					<p>
						X usuários já solicitaram o seu contato para negociar.
					</p>

					<p>
						<a href="#">Ver minhas negociações</a>
					</p>

				<h4> CONFIGURAÇÕES DA CONTA </h4>

					<p>
						Gostaria de receber notificações no meu email (s/n)
					</p>

					<p>
						Gostaria de receber ofertas do quebra-galho no meu email (s/n)
					</p>

					<p>
						<a href="#">Deletar conta</a>
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