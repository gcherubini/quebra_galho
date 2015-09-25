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

		ativaMenu("#menu_sobre");

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

		<h2> Sobre o Quebra-Galho </h1>
		<p>O Quebra-Galho é uma plataforma de busca e oferta de serviços especializados. Contamos com mais de 200 profissionais cadastrados, divididos em 37 áreas diferentes de atuação.</p>
		<p>Se você possui um talento que poderia ajudar muitas pessoas e gostaria que o mundo soubesse disso. <a href="novo_usuario.php">Cadastre-se já!</a></p>
		<p>Se você precisa de uma ajudinha para realizar alguma tarefa, mas não sabe muito bem a quem recorrer. <a href="index.php">Consulte agora</a> o nosso extenso banco de profissionais cadastrados, um deles pode ter a solução que você precisa!</p>
  
		<iframe width="560" height="315" src="https://www.youtube.com/embed/1E5WTK-76BU?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

		<h4>Caso você possua alguma dúvida, acesse nossa página de <a href="ajuda.php">Ajuda</a>.</h4>

		   <?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>

  </body>
</html>