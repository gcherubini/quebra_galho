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
 		ativaMenuPainelUsuario("#painel_menu_negociacoes");
 		carregaNegociacoes();
		

		$('.container').on('click', '.finalizar_negociacao_como_contratante', function() {
			finalizarNegociacaoComoContratante($(this).attr("id"));
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

	$.validator.setDefaults({
			submitHandler: function() {
				alert('la vamos nos')
			   /* $.ajax({
			        type : 'POST',
			        dataType : 'text',
			        data: $(form).serialize(),
			        url: 'backend/servico_novo.php',
			        success : function(result) {
			        	if(result == "") {
			        		sucessoSalvarDB(result);
			        	}
			        	else{
			        		erroSalvarDB(result);
			        	}
			        },
			        error: function(XMLHttpRequest, textStatus, errorThrown){
				        erroSalvarDB(textStatus);
				    }
			    });*/
				
			}
		});

	function carregaNegociacoes(){

		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        url: 'backend/negociacao_busca.php',
		        success : function(json_result) {
		        	//alert(json_result)
		        	//console.log(json_result)
		            // need to test in IE
		            var countJsonItens = Object.keys(json_result).length 

		 			if(countJsonItens == 0) {
	 					mostraMensagemDeNegociacoesNaoEncontradas()
		 			}
		 			else {
	            		$.each(json_result, function(index, json_result) {	
	            			populaNegociacaoNaTela(json_result);
		        		});
			        }
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    	mostraMensagemDeNegociacoesNaoEncontradas()
			    } 
		    });
	}

	function populaNegociacaoNaTela(json_result){
		// carregar servico (divs)
		var url_div = "webparts/painel_usuario_div_negociacao.php";
    	
		$.ajax({
		    type : 'GET',
		    dataType : 'text',
		    url: url_div,
		    data: ({servico: json_result}),
		    async: false,
		    success : function(div_result) {
		    	$('.negociacoes').append(div_result);
		    } 
		});
	}

	function finalizarNegociacaoComoContratante(id){

		$('.modal_nova_avaliacao').modal('toggle');

		
		
		/*$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        data: ({id: id}) ,
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
		    });*/
	}

 	function mostraMensagemDeNegociacoesNaoEncontradas() {
 		// quando há mudanca de filtros por exemplo
 		$('.itens_nao_encotrados').css("display","block");
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

						<div class="row itens_painel">
						 
						 	<div class="servico_img_painel col-xs-12 col-sm-2 col-md-2">
								<?php echo "<img src='img/usuarios/21_17-10-2015_07-44-30.jpg'>";?>
							</div>

						  	<div class="main_content_painel col-xs-8 col-sm-8 col-md-8">
						  		<h4> Nome: Patricia Silva </h4>
								<h5> Negociação iniciada em: 12/12/12 </h5>
								<h5> Fone: (51) 3737-9281 - Celular: (51) 9438-2932 </h5>
								<h5> E-mail: patricia@gmail.com </h5>
						  	</div>
						   	
						   	<div class="botao_remover_painel col-xs-4 col-sm-2 col-md-2">
								<p> 
									<a href="#" class="finalizar_negociacao btn btn-danger btn-block">Finalizar negociação</a>
								</p>
				  			</div>

						</div>
	
					<h2> Como contratante </h2>

					<p> Aqui você encontra informações adicionais sobre todos os prestadores de serviço que você demonstrou interesse em negociar.</p>

					<div class="negociacoes">

					</div>

					<div class="itens_nao_encotrados">
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