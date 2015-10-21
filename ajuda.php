<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   		<style>
			#linkcontato {
				font-weight: bold;
				font-size: 16px;
			}
		</style>
   <title>Quebra-Galho</title>

    <script type="text/javascript"> 
	$(document).ready(function () {
		ativaMenu("#menu_ajuda");
	});
	</script>


  </head>
  <body>

  	<div class="page">

		<?php include("webparts/topo.php"); ?>

	    <div class="container content">
			<?php include("webparts/resultado_de_operacoes.php"); ?>

			 <h1> Ajuda </h1>
			 
			 <h2> FAQ - Dúvidas frequentes </h2>
			 	<h3> Verifique abaixo as perguntas frequentes de nossos usuários. A sua dúvida já pode ter sido respondida. </h3>
			 		<h4>Contratante</h4>
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingOne">
						      <h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Nº1 - Como me registro no Quebra-Galho?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						      <div class="panel-body">
						        Para se cadastrar no Quebra-Galho, basta você acessar a página "<a href="novo_usuario.php">Cadastre-se</a>", preencher os seus dados corretamente e pronto! Você já pode usufruir dos benefícios que somente o Quebra-Galho oferece!
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingTwo">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Nº2 - Como adquiro mais créditos para a minha conta?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingThree">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Nº3 - Como encontro um prestador de serviços?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						      <div class="panel-body">
						      	Para encontrar um prestador de serviços que atenda às suas necessidades, basta acessar a <a href="index.php">Página Inicial</a>, utilizar os nossos filtros e escolher o profissional que possua as competências que você deseja. Dica: Caso você esteja procurando por um profissional específico, basta escrever o nome dele na barra de pesquisa. É fácil e rápido!
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingFour">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						          Nº4 - Como descubro o contato de um prestador de serviços de meu interesse?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingFive">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
						          Nº5 - Após contratar um prestador, como avaliar o serviço recebido?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingSix">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
						          Nº6 - Quais as minhas responsabilidades como contratante ao utilizar o Quebra-Galho?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
						      <div class="panel-body">
						        Para entender as suas responsabilidades ao utilizar o Quebra-Galho, acesse a nossa página de "<a href="#">Termos e Responsabilidades</a>".
						      </div>
						    </div>
						  </div>

						</div>

					<h4>Prestador de Serviços</h4>
						<div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
						  
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingSeven">
						      <h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
						          Nº7 - Como me registro no Quebra-Galho?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSeven">
						      <div class="panel-body">
						        Para se cadastrar no Quebra-Galho, basta você acessar a página "<a href="novo_usuario.php">Cadastre-se</a>", preencher os seus dados corretamente e pronto! Você já pode usufruir dos benefícios que somente o Quebra-Galho oferece!
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingEight">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
						          Nº8 - Como cadastro um serviço no Quebra-Galho?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
						      <div class="panel-body">
						        Basta acessar a página de <a href="novo_servico.php">Novos Serviços</a>, preencher os dados solicitados e esperar o contato de seus clientes!
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingNine">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
						          Nº9 - Posso cadastrar mais de um serviço no Quebra-Galho?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
						      <div class="panel-body">
						      	Sim! Com o Quebra-Galho você pode mostrar para o mundo todas as suas qualificações. Basta <a href="novo_servico.php">Publicar</a> um anúncio gratuito dentro das categorias disponíveis e pronto! Agora é só aguardar o contato dos seus clientes.
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingTen">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
						          Nº10 - Como adquiro mais créditos para a minha conta?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingEleven">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
						          Nº11 - O que devo fazer após receber uma avaliação de um cliente?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>

						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingTwelve">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
						          Nº12 - Quais as minhas responsabilidades como prestador de serviços ao utilizar o Quebra-Galho?
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve">
						      <div class="panel-body">
						        Para entender as suas responsabilidades ao utilizar o Quebra-Galho, acesse a nossa página de "<a href="#">Termos e Responsabilidades</a>".
						      </div>
						    </div>
						  </div>

						</div>

				<p class="obs_sobrehelp"> Caso ainda precise de ajuda, acesse nossa <a href="contato.php" class="obs_sobrehelp">Página de Contato</a>.</p>

			   <?php include("webparts/pagina_nao_encontrada.php"); ?>
	    </div>

	    <?php include("webparts/rodape.php"); ?>
	 </div>
 </body>
  
</html>