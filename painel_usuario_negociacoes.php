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
   <title>QuebraGalho: Encontre serviços de qualidade em Porto Alegre!</title>

   <script type="text/javascript"> 
   
 	$(document).ready(function () {
 		ativaMenuPainelUsuario("#painel_menu_negociacoes");
 		carregaNegociacoes("como_prestador_de_servico");
 		carregaNegociacoes("como_contratante");
		

		$('.container').on('click', '.finalizar_negociacao_como_contratante', function() {
			abrirModalAvaliacao($(this).attr("id"));
		});

		$('.container').on('click', '.solicitar_avaliacao_como_prestador', function() {
			solicitar_avaliacao_como_prestador($(this).attr("id"));
		});




		$(".avaliar_como_contratante_form").validate({
			rules: {
				descricao: {
					required: true
				},
				nota: {
					required: true
				}
			}
		});	
	});

 	// Avaliar como contratante submit formulario 
 	// Finalizar negociacao como contratante
	$.validator.setDefaults({
			submitHandler: function() {
				
			   $.ajax({
			        type : 'POST',
			        dataType : 'text',
			        data: $(".avaliar_como_contratante_form").serialize(),
			        url: 'backend/avaliacao_nova.php',
			        success : function(result) {
			        	if(result == "") {
			        		alert("Avaliação salva com sucesso!")
			        	}
			        	else{
			        		alert("Oops.. Aconteceu algum erro inesperado ao salvar sua avaliação, por favor tente mais tarde.")
			        	}

			        	$('.avaliar_como_contratante_form')[0].reset();
			        	$('.modal_nova_avaliacao').modal('hide');
			        	carregaNegociacoes("como_contratante");

			        },
			        error: function(XMLHttpRequest, textStatus, errorThrown){
				        alert("Oops.. Aconteceu algum erro inesperado ao salvar sua avaliação, por favor tente mais tarde.")
				    }
			    });
				
			}
		});

	function carregaNegociacoes(tipo){

		// limpa div negociacoes
		if(tipo == "como_contratante"){
			$('.negociacoes-como-contratante').text("");
		}

		// carrega negociacoes
		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        data: ({tipo: tipo}) ,
		        url: 'backend/negociacao_busca.php',
		        success : function(json_result) {
		        	//alert(json_result)
		        	//console.log(json_result)
		            // need to test in IE
		            var countJsonItens = Object.keys(json_result).length 

		 			if(countJsonItens == 0) {
	 					mostraMensagemDeNegociacoesNaoEncontradas(tipo)
		 			}
		 			else {
	            		$.each(json_result, function(index, json_result) {	
	            			populaNegociacaoNaTela(tipo,json_result);
		        		});
			        }
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    	mostraMensagemDeNegociacoesNaoEncontradas(tipo)
			    } 
		    });
	}

	function populaNegociacaoNaTela(tipo, json_result){

		// carregar servico (divs)
		var url_div = "";
		var url_div_sucess = "";

		if(tipo == "como_contratante"){
			url_div = "webparts/painel_usuario_div_negociacao_como_contratante.php";
			url_div_sucess = ".negociacoes-como-contratante";
		}
		else if(tipo == "como_prestador_de_servico"){
			url_div = "webparts/painel_usuario_div_negociacao_como_prestador_de_servico.php";
			url_div_sucess = ".negociacoes-como-prestador-de-servicos";
		}

		
		$.ajax({
		    type : 'GET',
		    dataType : 'text',
		    url: url_div,
		    data: ({servico: json_result}),
		    async: false,
		    success : function(div_result) {
		    	$(url_div_sucess).append(div_result);
		    } 
		});

		
	}

	function abrirModalAvaliacao(ids){
		$('.modal_nova_avaliacao').modal('toggle');
		$('.id_servico_e_contratado_input_hidden').val(ids);
	}

 	function mostraMensagemDeNegociacoesNaoEncontradas(tipo) {
 		// quando há mudanca de filtros por exemplo
 		if(tipo == "como_contratante"){
			$('.itens_nao_encotrados_como_contratante').css("display","block");
		}
		else if(tipo == "como_prestador_de_servico"){

		}

 		
 	}

 	function solicitar_avaliacao_como_prestador(ids) {
 		$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        data: ({ids: ids}) ,
		        url: 'backend/solicitar_avaliacao.php',
		        success : function(error_msg) {
		        	if(!valorEhVazio(error_msg)){
		        		mostraMsgDeSolicitacaoNaoEnviada(error_msg);
		        	}
		        	else{
		        		alert("Solicitação enviada ao contratante com sucesso!")
		        	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	mostraMsgDeSolicitacaoNaoEnviada(textStatus);
			    } 
		    });
 	}

 	function mostraMsgDeSolicitacaoNaoEnviada(error_msg) {
 		//alert(error_msg)
 		alert("Oops.. Aconteceu algum problema ao enviar sua solicitação, por favor tente mais tarde.")
 	}	



 	</script>


	<style>
		.main_content_painel {
			margin-bottom: 10px;
		}
	</style>


  </head>
  <body>
  	<?php include("webparts/modal_nova_avaliacao.php"); ?>

  	<div class="page">
			<?php include("webparts/topo.php"); ?>

		    <div class="container content">

		    <?php include("webparts/resultado_de_operacoes.php"); ?>

		<?php
			if (isset($_SESSION['id_usuario'])) {
		 ?>		

		 		<?php include("webparts/painel_usuario_menu.php"); ?>

		 		<div class="painel_usuario_main">
					
					<h1> Suas negociações </h1>

					<h2> Como prestador de serviços </h2>

					<p> Aqui você encontra informações adicionais sobre todos os clientes que acessaram o seu perfil e quiseram negociar com você.</p>

					
					<div class="negociacoes-como-prestador-de-servicos">

					</div>

	
					<h2> Como contratante </h2>

					<p> Aqui você encontra informações adicionais sobre todos os prestadores de serviço que você demonstrou interesse em negociar.</p>

					

					<div class="negociacoes-como-contratante">

					</div>

					<div class="itens_nao_encotrados itens_nao_encotrados_como_contratante">
						<p> Você ainda não está negociando com nenhum quebra-galho... </p>
						<a href="index.php"> Encontre um Quebra-Galho  </a>
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