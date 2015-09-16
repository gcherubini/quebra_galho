<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Bootstrap 101 Template</title>

   <script type="text/javascript"> 
   
 	$(document).ready(function () {
 		
 		buscaEcarregaServicos();

		$('.deletar_servico').click(function() {
	     		var id_servico = $(this).attr("id");
	     		//alert(id_servico);
	     		deletaServico(id_servico);
		});

 	});
	function deletaServico(id_servico){
		$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        data: ({id_servico: id_servico}) ,
		        url: 'backend/deletar_servico.php',
		        async: false,
		        success : function(json_result) {
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

	function buscaEcarregaServicos(){

		limpaServicos();

		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        data: ({filtroIdUsuario: <?php echo $_SESSION['id_usuario']; ?>	}) ,
		        url: 'backend/busca_servicos.php',
		        async: false,
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
			        		comboJaFoiPopulado = true;
			        }
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    	mostraMensagemDeItensNaoEncontrados()
			    } 
		    });
	}

	function populaServicoNaTela(servico_json){
		// carregar servico (divs)
		var url_div = "webparts/painel_servico_div_servico_publicado.php";
    	
		$.ajax({
		    type : 'GET',
		    dataType : 'text',
		    url: url_div,
		    data: ({servico: servico_json}),
		    async: false,
		    success : function(div_result) {
		    	$('.servicos_publicados').append(div_result);
		    } 
		});
	}

	function mostraMensagemDeItensNaoEncontrados() {
 		// quando há mudanca de filtros por exemplo
 		$('.servicos_itens_nao_encotrados').css("display","block");
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

	<?php include("webparts/header.php"); ?>

    <div class="container">

<?php
	if (isset($_SESSION['id_usuario'])) {
 ?>		
 
		 <h2> Painel do usuário </h1>
		 
		 <p>
		 	Olá <b> <?php echo $_SESSION["nome"]; ?> </b>, seja bem vindo ao seu painel de configurações 
		 </p>		

		  <h3> Seus serviços publicados </h1>

		  <div class="servicos_publicados">

		  </div>
		  <div class="servicos_itens_nao_encotrados">
			<p> Você ainda não publicou nenhum serviço... </p>
		</div>
<?php
	} else {
	  include("webparts/div_voce_precisa_se_logar.php"); 
	}
?>		
				
			
    </div>

  </body>
</html>