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

 	function mostraMensagemDeNegociacoesNaoEncontradas() {
 		// quando há mudanca de filtros por exemplo
 		$('.itens_nao_encotrados').css("display","block");
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
			
			<h3> Suas negociações </h1>

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

  </body>
</html>