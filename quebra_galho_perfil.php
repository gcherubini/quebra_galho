<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
//mudar pra post...
$id_servico = isset($_GET['id_servico']) ? trim($_GET['id_servico']) : 0;
echo "<script> var id_servico = $id_servico; </script>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Bootstrap 101 Template</title>

   <script type="text/javascript">

	$().ready(function () {
		if(id_servico != 0) {
 			buscaQuebraGalho();
 		}
 		else {
 			$(".pagina_nao_encontrada").css("display","block");
 		}
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
	

	</script>

  </head>
  <body>

	<?php include("webparts/header.php"); ?>

    <div class="container">
		 <h1 class="servico_titulo">  </h1>
		 <p class="servico_emprego">  </p>
    

		 <div class="pagina_nao_encontrada">
	    	<p>
	    		Página não encontrada!
	    	</p>
	    </div>

    </div>

    


    <?php include("webparts/rodape.php"); ?>

  </body>
</html>