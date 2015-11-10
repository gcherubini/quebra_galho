<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
//mudar pra post...

$id_usuario = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : 0;
$id_servico = isset($_GET['id_servico']) ? trim($_GET['id_servico']) : 0;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Quebra-Galho: Encontre serviços de qualidade em Porto Alegre!</title>

   <script type="text/javascript">

   <?php
   		echo " var id_servico = $id_servico; ";
		echo " var id_usuario = $id_usuario; ";
   ?>

	$().ready(function () {
		if(id_servico != 0) {
 			buscaQuebraGalho();
 		}
 		else {
 			$(".pagina_nao_encontrada").css("display","block");
 			$(".quebra_galho_perfil").css("display","none");
 		}

 		$('.container').on('click', '.negociar', function() {
			negociar();
		});
	});

	function buscaQuebraGalho(){
		$.ajax({
		    type : 'POST',
		    dataType : 'json',
		    data: ({filtroIdServico: id_servico}) ,
		    url: 'backend/servico_busca.php',
		    success : function(json_result) {
		    	$.each(json_result, function(index, servico_json) {	
					populaServicoNaTela(servico_json);
				});
		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown){
		    	//alert("error: " + textStatus);
		    } 
	    });
	}

	function populaServicoNaTela (servico_json) {
		$(".servico_nome").text(servico_json.nome);
		$(".servico_emprego_e_idade").text(servico_json.emprego);
		$(".servico_emprego_e_idade").append(" (" + servico_json.idade + " anos)");
		$(".servico_slogan").text( '"' + servico_json.slogan + '"');
		$(".servico_descricao").text(servico_json.descricao);
		$(".servico_cidade").text(servico_json.cidade);
		$('.usuario_foto').attr("src", servico_json.usuario_img_url);
 		
	}
	
	function negociar() {
		if(id_usuario == 0) {
			window.location.href = "login.php?pAnt=index.php";

		}
		else {
			$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        url: 'backend/negociacao_nova.php',
		        data: ({id_servico: id_servico}) ,
		        success : function(json_result) {
		        	//alert(JSON.stringify(json_result));
					//alert(json_result.errorMessage);

					if(valorEhVazio(json_result.errorMessage)){
	        			$.each(json_result, function(index, json_result) {	
		        			sucessoAoNegociar(json_result);
						});
		        	}
		        	else {
		        		mostraResultadoOperacoes(false, json_result.errorMessage);
		        	}

		        	
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			       mostraResultadoOperacoes(false, "Aconteceu um erro inesperado ao tentar negociar, tente mais tarde...");
			    }
	    	});
		}
	}

	function sucessoAoNegociar(json_result) {
		//mostraResultadoOperacoes(true, "Usuário salvo no seu perfil com sucesso");
		$(".servico_email_contato").text(json_result.email_contato);
		$(".servico_cel_contato").text(json_result.cel_contato);
		$(".servico_telefone_contato").text(json_result.tel_contato);
		$('.modal_quero_contratar').modal('toggle');
	}

	</script>

  </head>
  <body>
  	<div class="page">
		<?php include("webparts/topo.php"); ?>
		<?php include("webparts/modal_quero_contratar.php"); ?>

	    <div class="container content">

	    <?php include("webparts/resultado_de_operacoes.php"); ?>

	    	<div class="quebra_galho_perfil_box">
	    		<div class="quebra_galho_perfil_box_content"> 
					

					<div class="quebra_galho_perfil"> 
						<div class="row">
			
		     				<div class="col-xs-6 col-sm-4 col-md-4 perfil-1i1j">
		     					 <img class="cropit-image-preview usuario_foto" />
		     				</div>
		     				<div class="col-xs-6 col-sm-8 col-md-8 perfil-1i2j">
		     					 <h2 class="servico_nome">  </h2>
		     					 <h5 class="servico_emprego_e_idade"> </h5>
		     					  <p class="servico_slogan">  </p> 
		     				</div>
		     			</div>
					
						 <p class="servico_descricao">  </p>
						 <p class="servico_cidade"></p>
						 	
						 <a class="negociar" href="#">
							 <div class="botao_negociar">
						 	 	<p> Quero Contratar! </p>
						 	</div>
						 </a>
						 <p class="avaliacoes_texto_perfilpub">Avaliações: </p>
					</div>
				</div>
			</div>
	    
		    <?php include("webparts/pagina_nao_encontrada.php"); ?>
	    </div>

	    


	    

	    <?php include("webparts/rodape.php"); ?>
	 </div>

  </body>
</html>