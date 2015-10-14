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
 		ativaMenuPainelUsuario("#painel_menu_notificacoes");
 		populaNegociacaoNaTela();

 		
 		carregaNotificacoes();

		$('.container').on('click', '.deletar_notificacao', function() {
			deletaNotificacao($(this).attr("id"));
		});

 	});

 	/* not implemented yet */
	function deletaNotificacao(id_servico){
		$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        data: ({id_servico: id_servico}) ,
		        url: 'backend/deletar_notificacao.php',
		        success : function(json_result) {
		        	alert(json_result)
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

	function carregaNotificacoes(){

		limpaServicos();

		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        url: 'backend/notificacao_busca.php',
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
		            			populaNegociacaoNaTela(servico_json);
			        		});
			        }
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    	mostraMensagemDeItensNaoEncontrados()
			    } 
		    });
	}

	function populaNegociacaoNaTela(json_result){
		// carregar servico (divs)
		var url_div = "webparts/painel_usuario_div_notificacao.php";
    	
		$.ajax({
		    type : 'GET',
		    dataType : 'text',
		    url: url_div,
		    data: ({notificacao: json_result}),
		    async: false,
		    success : function(div_result) {
		    	$('.notificacoes').append(div_result);
		    } 
		});
	}
	
	function populaNegociacaoNaTela() {
		$.ajax({
		    dataType : 'text',
		    url: "backend/notificacao_marca_vista_por_usuario.php",
		    success : function(error_msg) {
		    },
	        error: function(XMLHttpRequest, textStatus, errorThrown){
		    } 
		});
 	}

	function mostraMensagemDeItensNaoEncontrados() {
 		$('.itens_nao_encotrados').css("display","block");
 	}

 	function mostraMensagemDeErroNaDelecao() {
 		alert("Ops... Aconteceu um erro ao deletar esta notificação, por favor tentar mais tarde.")
 	}
 	
 	function limpaServicos() {
 		$('.notificacoes').text("");
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
		
			<div class="notificacoes">

			</div>
			
			<div class="itens_nao_encotrados">
				
				<p> Você ainda não tem nenhuma notificação... </p>
			
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