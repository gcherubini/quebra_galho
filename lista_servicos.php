<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Bootstrap 101 Template</title>

	<script type="text/javascript"> 

	var comboJaFoiPopulado = false;

 	$(document).ready(function () {
 		
		$('.input_texto_pesquisar').on('input',function(e){
		    buscaEcarregaServicos();
		});

		$('.combo_tipo_de_servico').on('change', function() {
			buscaEcarregaServicos();
		});

		buscaEcarregaServicos();
	});




	function buscaEcarregaServicos(){
		limpaServicos();

		var filtroDeTexto = $('.input_texto_pesquisar').val();
		var filtroDoCombo = $('.combo_tipo_de_servico').val();

		$.ajax({
		        type : 'GET',
		        dataType : 'json',
		        data: ({filtroDeTexto: filtroDeTexto, filtroDoCombo: filtroDoCombo}) ,
		        url: 'backend/busca_servicos.php',
		        async: false,
		        success : function(json_result) {
		        	//alert(json_result)
		        	//console.log(json_result)
		           
		            $.each(json_result, function(index, servico_json) {	
		            	populaServicoNaTela(servico_json);
		            	populaCombo(servico_json);
			        });
			        comboJaFoiPopulado = true;
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    } 
		    });
	}
	
	
	function populaCombo(servico_json){
		// carregar servico no combo de tipo de servicos
		if(comboJaFoiPopulado == false) {
			$('.combo_tipo_de_servico').append("<option>" + servico_json.categoria + "</option>");
		}
	}

	function populaServicoNaTela(servico_json){
		// carregar servico (divs)
		var url_div = "webparts/div_servico.php";
    	if(servico_json.destaque == true) {
    		url_div = "webparts/div_servico_destaque.php"; 
    	}

		$.ajax({
		    type : 'GET',
		    dataType : 'text',
		    url: url_div,
		    data: ({servico: servico_json}),
		    async: false,
		    success : function(div_result) {
		    	$('.servicos').append(div_result);
		    } 
		});
	}

	function limpaServicos() {
 		// quando há mudanca de filtros por exemplo
 		$('.servicos').text("");
 	}


	</script>

  </head>
  <body>

	

    <div class="container">

		<?php include("webparts/header.php"); ?>
		
		
		<br>
		<p> Encontre o serviço que necessita com os campos de pesquisa abaixo: </p>
		

		<div class="row">
			<div class="col-md-8"> 
					<input type="text" class="form-control input_texto_pesquisar" placeholder="Pesquisar por...">
			</div>
			<div class="col-md-4"> 
					<select class="form-control combo_tipo_de_servico">
						<option value="">Tipo de serviço</option>
					</select>
			</div>
		</div>
					
		<div class="row servicos">
		</div>
    </div>

  </body>
</html>