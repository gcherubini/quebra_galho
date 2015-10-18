<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Quebra-Galho</title>

	<script type="text/javascript"> 
	
	var carregouTodosOsItems = false;
	var numeroDeItensPorPaginacao = 10;
	var numeroDeServicosEmLinha = 4;

	var paginasCarregadas = 0;
	
	$(document).ready(function () {
		ativaMenu("#menu_inicio");

		<?php if ($pesquisa != '') {
		echo " $('.input_texto_pesquisar_topo').val('".$pesquisa."'); ";
		}?>


		$(".paginacao_carregando_acabou_msg").css("display","none");

		$(window).scroll(function() {
		   if($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
		   		//alert("chegou no fim");
		       $(".paginacao_carregando_img").css("display","block");
		       $(".paginacao_carregando_acabou_msg").css("display","none");
		       
		       setTimeout(carregaServicos,1500,$('.input_texto_pesquisar_topo').val());
		   }
		});
	});


	var comboJaFoiPopulado = false;
	var filtroAplicado = false;


 	$(document).ready(function () {
 		
 		// click does not work when we have imported php with ajax
		$('.container').on('click', '.abrir_quebra_galho', function() {
			abrirQuebraGalho($(this).attr("id"));
		});


		$('.container').on('click', '.botao_procura', function() {
			paginasCarregadas = 0;
		    carregaServicos($('.input_texto_pesquisar_topo').val());
		});
		
		carregaServicos($('.input_texto_pesquisar_topo').val());
	});

	function carregaServicos(filtroTexto){
		if(paginasCarregadas == 0) {
			limpaServicos();
		}

		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        data: ({limit: numeroDeItensPorPaginacao,
		        		offset: numeroDeItensPorPaginacao*paginasCarregadas, 
		        		filtroTexto:  filtroTexto, 
		        	    }) ,
		        url: 'backend/servico_busca.php',
		        async: false,
		        success : function(json_result) {
		        	//alert(json_result)
		        	//console.log(json_result)
		            paginasCarregadas++;
		            
		            // need to test in IE
		            var countJsonItens = Object.keys(json_result).length ;
		            //alert(countJsonItens)
		            if(countJsonItens == 0 && paginasCarregadas > 0) {
		            	carregouTodosOsItems = true;
		            }
		 			if(countJsonItens == 0 && paginasCarregadas == 1) {
		 					mostraMensagemDeItensNaoEncontrados()
		 			}
		 			else {
		            		$.each(json_result, function(index, servico_json) {	
		            			populaServicoNaTela(servico_json);
		            			populaComboTipoServico(servico_json);
			        		});
			        		comboJaFoiPopulado = true;
			        }
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    	mostraMensagemDeItensNaoEncontrados()
			    } 
		    });
		
		setTimeout(terminaCarregarServicos,1000);
	}

	function terminaCarregarServicos(){
		$(".paginacao_carregando_img").css("display","none");

	    if(carregouTodosOsItems = true && paginasCarregadas > 1){
			// need to fix this
			$(".paginacao_carregando_acabou_msg").css("display","block");
		}
	}
	
	function populaComboTipoServico(servico_json){
		// carregar servico no combo de tipo de servicos
		if(comboJaFoiPopulado == false) {
			$('.combo_tipo_de_servico').append("<option>" + servico_json.emprego + "</option>");
		}
	}

	function populaServicoNaTela(servico_json){
		// carregar servico (divs)
		var url_div = "webparts/lista_servicos_div_servico.php";
    	if(servico_json.destaque == true) {
    		url_div = "webparts/lista_servicos_div_servico_destaque.php"; 
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


	function mostraMensagemDeItensNaoEncontrados() {
 		// quando há mudanca de filtros por exemplo
 		$('.servicos_itens_nao_encotrados').css("display","block");
 		carregaServicos("");


 	}

	function limpaServicos() {
 		// quando há mudanca de filtros por exemplo
 		$('.servicos').text("");
 		$('.servicos_itens_nao_encotrados').css("display","none");
 	}

 	function abrirQuebraGalho(id_servico){
		window.location.replace("quebra_galho_perfil.php?id_servico="+id_servico);
	}


	</script>

  </head>
  <body>

	<?php include("webparts/topo.php"); ?>
		
    <div class="container container-lista-servicos">
    	<?php include("webparts/resultado_de_operacoes.php"); ?>

			<!-- 
			<div class="col-md-3"> 
					<select class="form-control combo_tipo_de_servico">
						<option value="">Tipo de serviço</option>
					</select>
			</div>
			<div class="col-md-3"> 
					<select class="form-control combo_estado" name="combo_estado">
						<option value="">Todos os estados</option>
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AP">Amapá</option>
						<option value="AM">Amazonas</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espirito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MT">Mato Grosso</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MG">Minas Gerais</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraiba</option>
						<option value="PR">Paraná</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="SC">Santa Catarina</option>
						<option value="SP">São Paulo</option>
						<option value="SE">Sergipe</option>
						<option value="TO">Tocantis</option> 
					</select>

			</div>
			-->
	
		<div class="servicos_itens_nao_encotrados">
			<p  style="margin-bottom:20px;"> Desculpe... Nenhum quebra-galho foi encontrado em sua busca. </p>
			<p> Veja alguns outros serviços abaixo: </p>
		</div>

		<div id="servicos" class="servicos">
		</div>
		


		<div style="clear:both;"></div>
		
		<div class="paginacao_carregando">	
			<img class="paginacao_carregando_img" src="img/carregando.gif" />
			<p class="paginacao_carregando_acabou_msg"> Não há mais resultados... </p>
		</div>

		 <?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>

  </body>
</html>