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
 		ativaMenuPainelUsuario("#painel_menu_avaliacoes");
 		
 		carregaServicos();

		$('.container').on('click', '.deletar_servico', function() {
			deletaServico($(this).attr("id"));
		});

 	});

	function deletaServico(id_servico){
		$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        data: ({id_servico: id_servico}) ,
		        url: 'backend/servico_deletar.php',
		        success : function(json_result) {
		        	//alert(json_result)
		        	if(json_result != "") {
		        		mostraMensagemDeErroNaDelecao()
		        	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	//alert("error: " + textStatus);
			    	mostraMensagemDeErroNaDelecao()
			    } 
		    });
	}

	function carregaServicos(){

		limpaServicos();

		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        data: ({filtroIdUsuario: <?php echo $_SESSION['id_usuario']; ?>	, limit: "999"}) ,
		        url: 'backend/servico_busca.php',
		        success : function(json_result) {
		        	//alert(json_result)
		        	//console.log(json_result)
		            // need to test in IE
		            var countJsonItens = Object.keys(json_result).length 

		 			if(countJsonItens == 0) {
		 					mostraMensagemDeItensNaoEncontrados()
		 			}
		 			else {
		            		$.each(json_result, function(index, servico_json) {	
		            			populaServicoNaTela(servico_json);
			        		});
			        }
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    	mostraMensagemDeItensNaoEncontrados()
			    } 
		    });
	}

	function populaServicoNaTela(json_result){
		// carregar servico (divs)
		var url_div = "webparts/painel_usuario_div_avaliacao.php";
    	
		$.ajax({
		    type : 'GET',
		    dataType : 'text',
		    url: url_div,
		    data: ({servico: json_result}),
		    async: false,
		    success : function(div_result) {
		    	$('.servicos_publicados').append(div_result);
		    } 
		});
	}

	function mostraMensagemDeItensNaoEncontrados() {
 		// quando há mudanca de filtros por exemplo
 		$('.itens_nao_encotrados').css("display","block");
 	}

 	function mostraMensagemDeErroNaDelecao() {
 		alert("Ops... Aconteceu um erro ao deletar este serviço, por favor tentar mais tarde.")
 	}
 	
 	function limpaServicos() {
 		$('.servicos_publicados').text("");
 	}

 	</script>
  </head>
  <body>
  	<div class="page">

			<?php include("webparts/topo.php"); ?>

		    <div class="container content">

		    <?php include("webparts/resultado_de_operacoes.php"); ?>

		<?php
			if (isset($_SESSION['id_usuario'])) {
		 ?>		

		 		<?php include("webparts/painel_usuario_menu.php"); ?>		

		 		<div class="painel_usuario_main">

					<h1> Suas avaliações </h1>

					<h2> Avaliações pendentes </h2>

					<p> Abaixo, é possível verificar as avaliações que você recebeu de outros usuários e que necessitam ser aprovadas/respondidas por você para serem publicadas no seu perfil. </p>

					<p><b>Obs: Avaliações negativas que não forem respondidas por você serão publicadas automaticamente no seu perfil no prazo de 5 dias após o recebimento da avaliação. </b></p>

					<div class="avaliacoes_pendentes">

					</div>

					<h2> Avaliações publicadas no seu perfil </h2>

					<p> As avaliações a seguir se encontram publicadas no seu perfil, de modo que todos usuários do Quebra-Galho podem conferí-las </p>

					<div class="avaliacoes_publicadas">

					</div>

					 <div class="itens_nao_encotrados">
						<p> Você ainda não publicou nenhum serviço... </p>
						<a href="servico_novo.php"> Seja um Quebra-Galho </a>
					</div>

				</div>

				  
		<?php
			} else {
			  include("webparts/div_voce_precisa_se_logar.php"); 
			}
		?>		
							
					<?php include("webparts/pagina_nao_encontrada.php"); ?>
		    </div>

		     <?php include("webparts/rodape.php"); ?>
	</div>
  </body>
</html>