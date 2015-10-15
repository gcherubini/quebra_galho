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


	    $('.btn-edit').click(function() {
	    	$('.btn-edit').css("display","none")
	    	$('.btn-save').css("display","block")
	    	habilitaEdesabilitaInputs()
	    });

	    $('.btn-save').click(function() {
	    	$('.btn-edit').css("display","block")
	    	$('.btn-save').css("display","none")
	 		habilitaEdesabilitaInputs()
	    });
	});

	function habilitaEdesabilitaInputs(){
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
	}


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
	 
					<p>
						Olá <b> <?php echo $_SESSION["nome"]; ?></b>, seja bem-vindo(a) ao seu painel de configurações.
					</p>

					<p>
						Aqui você encontra um resumo sobre o seu perfil, onde pode modificar algumas informações pessoais e configurações da sua conta.
					</p>

				<h2> Meu Perfil </h2>

					<p>
						Nome: <?php echo $_SESSION["nome"]; ?>
					</p>

					<p>
						E-mail: <input class="form-control" type='text' disabled value="joana@gmail.com"></input>
					</p>

					<p>
						Senha: <input class="form-control" type='password' disabled value="123456"></input>
					</p>

					<p>
						Telefone: <input class="form-control" type='text' disabled value="3269-9999"></input>
					</p>

					<p>
						Endereço: <input class="form-control" type='text' disabled value="R. Grande, 123"></input>
					</p>

					<div class="btn btn-default btn-edit">Editar</div>

					<div class="btn btn-default btn-save">Salvar</div>

				<h2> Minhas Avaliações </h2>

					<p>
						Você possui X avaliações - X pendentes (<a href="#">Publique agora!</a>) e X publicadas (<a href="#">Ver</a>)
					</p>

					<p>
						Sua reputação atual é X.
					</p>

					<p>
						<a href="#">Ver minhas avaliações</a>
					</p>

				<h2> Meus Anúncios </h2>

					<p>
						Você possui X anúncios cadastrados.
					</p>

					<p>
						<a href="#">Ver meus anúncios</a> - <a href="#">Promova agora o seu anúncio!</a>
					</p>

				<h2> Minhas Negociações </h2>

					<p>
						X usuários já solicitaram o seu contato para negociar.
					</p>

					<p>
						<a href="painel_usuario_negociacoes.php">Ver minhas negociações</a>
					</p>

				<h2> Configurações da Conta </h2>

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