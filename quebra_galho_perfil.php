<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
//mudar pra post...

$id_usuario = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : 0;
$id_servico = isset($_POST['id_servico']) ? trim($_POST['id_servico']) : 0;
echo "<script> var id_servico = $id_servico; </script>";
echo "<script> var id_usuario = $id_usuario; </script>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Quebra-Galho</title>

   <script type="text/javascript">

	$().ready(function () {
		if(id_servico != 0) {
 			buscaQuebraGalho();
 		}
 		else {
 			$(".pagina_nao_encontrada").css("display","block");
 			$(".quebra_galho_perfil").css("display","none");
 		}

 		$('.container').on('click', '.contratar', function() {
			contratar();
		});
	});

	function buscaQuebraGalho(){
		$.ajax({
		    type : 'POST',
		    dataType : 'json',
		    data: ({filtroIdServico: id_servico}) ,
		    url: 'backend/busca_servicos.php',
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
		$(".servico_titulo").text(servico_json.nome);
		$(".servico_emprego").text(servico_json.emprego);
	}
	
	function contratar() {
		if(id_usuario == 0) {
			$.redirect("voce_precisa_de_uma_conta.php"); 
		}
		else {
			$.ajax({
		        type : 'POST',
		        dataType : 'text',
		        url: 'backend/contratar_servico.php',
		        data: ({id_servico: id_servico}) ,
		        success : function(result) {
		        	if(result == ""){
		        		mostraResultadoOperacoes(true, "Usuário salvo no seu perfil com sucesso");
		        	}
		        	else {
		        		erroAoContratar(result);
		        	}
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			       erroAoContratar(textStatus);
			      
			    }
	    	});
		}
	}

	function erroAoContratar(error) {
		 alert("Aconteceu um erro inesperado ao tentar contratar, tente mais tarde...");
		 mostraResultadoOperacoes(false, error);
	}

	</script>

  </head>
  <body>

	<?php include("webparts/topo.php"); ?>

    <div class="container">

    <?php include("webparts/resultado_de_operacoes.php"); ?>

    	<div class="quebra_galho_perfil"> 
    		 <h1 class="servico_titulo">  </h1>
			 <p class="servico_emprego">  </p>
			 <a class="contratar" href="#"> Contratar </a>
    	</div>
    
	    <?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    


    

    <?php include("webparts/rodape.php"); ?>

  </body>
</html>