<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$pesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>QuebraGalho: Encontre serviços de qualidade em Porto Alegre!</title>

   <style>
	   .sidebar-categorias .activate {
	   		background-color: #FFAE1A;	
	   }
   </style>

	<script type="text/javascript"> 
	
	var carregouTodosOsItems = false;
	var numeroDeItensPorPaginacao = 10;
	var numeroDeServicosEmLinha = 4;
	var comboJaFoiPopulado = false;
	var filtroAplicado = false;

	
	var paginasCarregadas = 0;
	var filtroCategorias = "";
	var filtroCidades = "";
	
	$(document).ready(function () {

		//getting filtroCategorias session and populating it 
		if(!valorEhVazio($.session.get("filtroCategorias"))){
			filtroCategorias = $.session.get("filtroCategorias");
			var filtroCArray = filtroCategorias.split(',');
			for (f in filtroCArray) {
				var catSession = $.trim(filtroCArray[f]);
				var cat =  $(".sidebar-categoria-item:contains('"+catSession+"')");
				var procura_cat = cat.text();
				procura_cat = $.trim(procura_cat);

				if (catSession == procura_cat){
					cat.addClass("activate");
				}
			}
		}

		//getting filtroCidades session and populating it 
		if(!valorEhVazio($.session.get("filtroCidades"))){
			filtroCidades = $.session.get("filtroCidades");
			// the rest of the code to populate filtro cidades with session value, 
			// is in quebra_galho.js -> success reuslt populating cidades in combo	
			/*var filtroCArray = filtroCidades.split(',');
			for (f in filtroCArray) {
				var catSession = $.trim(filtroCArray[f]);
				$(".cidades option[value='"+catSession+"']").attr("selected","selected");
			}*/
		}

		$(".container").on("mouseover", ".servico2 , .servico_destaque", function(){
		   $(this).children(".servico_img").css("opacity","0.8");

		});

		$(".container").on("mouseout", ".servico2 , .servico_destaque", function(){
		   $(this).children(".servico_img").css("opacity","1");
		});

		$(".sidebar-categoria-item").click(function(event){
			if ($(this).hasClass("activate")){
				$(this).removeClass("activate");
				filtroCategorias = filtroCategorias.replace("," + $(this).children(".sidebar-categoria-text").text(), "");
			}
			else{
			    $(this).addClass("activate");
			    filtroCategorias += "," + $(this).children(".sidebar-categoria-text").text();
			}

			$.session.set("filtroCategorias", filtroCategorias);

			paginasCarregadas = 0;
			carregaServicos($('.input_texto_pesquisar_topo').val(),filtroCategorias, filtroCidades);
		});


		 $(".cidades").change(function(event) {
		 	filtroCidades = "";
		 	$(".cidades option:selected").each(function(){
				 var cidade = $(this).val()
				 filtroCidades += "," + cidade;
			});
		   
		    $.session.set("filtroCidades", filtroCidades);

		   	paginasCarregadas = 0;
			carregaServicos($('.input_texto_pesquisar_topo').val(),filtroCategorias, filtroCidades);
		  });


		ativaMenu("#menu_inicio");
		carregaComboCidade(".cidades");

		<?php if ($pesquisa != '') {
		echo " $('.input_texto_pesquisar_topo').val('".$pesquisa."'); ";
		}?>


		$(".paginacao_carregando_acabou_msg").css("display","none");

		$(window).scroll(function() {
		   if($(window).scrollTop() + $(window).height() > $(document).height() - 40) {
		   		//alert("chegou no fim");
		       $(".paginacao_carregando_img").css("display","block");
		       $(".paginacao_carregando_acabou_msg").css("display","none");
		       
		       setTimeout(carregaServicos,1500,$('.input_texto_pesquisar_topo').val(), filtroCategorias, filtroCidades);
		   }
		});

		// click does not work when we have imported php with ajax
		$('.container').on('click', '.abrir_quebra_galho', function() {
			abrirQuebraGalho($(this).attr("id"));
		});


		$('.container').on('click', '.botao_procura', function() {
			paginasCarregadas = 0;
		    carregaServicos($('.input_texto_pesquisar_topo').val(),filtroCategorias, filtroCidades);
		});
		
		carregaServicos($('.input_texto_pesquisar_topo').val(),filtroCategorias, filtroCidades);
	});


	
	function carregaServicos(filtroTexto, filtroCategorias, filtroCidades){
		if(paginasCarregadas == 0) {
			limpaServicos();
		}

		//deletando virgula se existir no inicio do filtro
		var filtrarPor = filtroTexto + filtroCategorias + filtroCidades;
		filtrarPor = filtrarPor.indexOf(',') == 0 ? filtrarPor.substring(1) : filtrarPor;

		//alert(filtrarPor)

		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        data: ({limit: numeroDeItensPorPaginacao,
		        		offset: numeroDeItensPorPaginacao*paginasCarregadas, 
		        		filtroTexto:  filtrarPor, 
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
 		carregaServicos("","", "");


 	}

	function limpaServicos() {
 		// quando há mudanca de filtros por exemplo
 		$('.servicos').text("");
 		$('.servicos_itens_nao_encotrados').css("display","none");
 		$(".paginacao_carregando_acabou_msg").css("display","none");
 	}

 	function abrirQuebraGalho(id_servico){
		window.location.replace("quebra_galho_perfil.php?id_servico="+id_servico);
	}


	</script>

  </head>
  <body>
  	<div class="page">
	<?php include("webparts/topo.php"); ?>

	<!-- carrossel !-->

		    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					    <li data-target="#myCarousel" data-slide-to="2"></li>
					    <li data-target="#myCarousel" data-slide-to="3"></li>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
					    <div class="item active">
					    	<!-- texto1

					    	<h1 class = "slider-texto1">

					      		ENCONTRE PROFISSIONAIS DE QUALIDADE
					      	</h1>
					      	<p class="slider-texto1-2">
					      		Contrate serviços locais ou remotos.
					      	</p>

							!-->

					      <img src="img/garden2.jpg" alt="garden2">
					      	
						</div>

					    <div class="item">

					    	<!-- texto2

					    	<h1 class = "slider-texto2">
					      		ANUNCIE GRATUITAMENTE
					      	</h1>
					      	<p class="slider-texto2-2">
					      		Cadastre-se e anuncie seu serviço desde já.
					      	</p>

							!-->

					      <img src="img/working2.jpg" alt="working2">
					    </div>

					    <div class="item">

					    	<!-- texto3

					    	<h1 class = "slider-texto3">
					      		SEJA RECONHECIDO
					      	</h1>
					      	<p class="slider-texto3-2">
					      		Faça um serviço de qualidade e ganhe destaque 	pela sua reputação.
					      	</p>

							!-->

					      <img src="img/dj2.jpg" alt="dj2">
					    </div>

					    <div class="item">

					    	<!-- texto4

					    	<h1 class = "slider-texto4">
					      		FAÇA COM QUEM SABE
					      	</h1>
					      	<p class="slider-texto4-2">
					      		Encontre um profissional que faça exatamente o que você precisa.
					      	</p>

							!-->

					      <img src="img/kitchen2.jpg" alt="kitchen2">
					    </div>
					  </div>

					  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				</div>
		
    <div class="container content">

		<div class="row" >
			<div class="col-xs-12 col-sm-3 col-md-3 ">
				<div class="sidebar">
		        	<p class="sidebar-title"> Que tipo de serviço você precisa? </p>	
		        	<div class="sidebar-categorias">
		        		<ul>
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-home"> </span> <div class="sidebar-categoria-text ">Domésticos</div>  </li>
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-wrench"> </span> <div class="sidebar-categoria-text  sidebar-item-direita">Manutenção</div>  </li>	
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-plus"> </span> <div class="sidebar-categoria-text ">Saúde</div> </li>
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-education"> </span> <div class="sidebar-categoria-text  sidebar-item-direita">Aulas</div>  </li>
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-cutlery"> </span> <div class="sidebar-categoria-text ">Alimentação</div> </li>
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-equalizer"> </span>  <div class="sidebar-categoria-text  sidebar-item-direita">Eventos</div> </li> 
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-pencil"> </span>  <div class="sidebar-categoria-text ">Artes</div> </li>
		        			<li class="sidebar-categoria-item"> <span class="glyphicon glyphicon-sunglasses"> </span> <div class="sidebar-categoria-text  sidebar-item-direita">Moda</div>  </li>
		        		</ul>
		        	</div>

		        	<div style="clear:both;"> </div>

		        	<p class="sidebar-title top20"> Em que cidades de atuação? </p>

		        	<select  class="form-control cidades chosen-select" id="cidades" name="cidades[]" multiple
					 		data-placeholder="Cidade(s) de atuação" >
							<option value="Remotamente/Não-presencial"> Remotamente/Não-presencial </option>
					</select>

					<hr class="top20"/>

					<div class="sidebar-propaganda">
						<img src="img/banners/banner_tumelero.jpg" >
					</div>

					<div class="sidebar-propaganda">
						<img src="img/banners/banner_fg.jpg" >
					</div>

		       	</div>
	       	</div>
	        
	        <div class="col-xs-12 col-sm-9 col-md-9 container-lista-servicos">
		    	<?php include("webparts/resultado_de_operacoes.php"); ?>

					<!-- 
					<div class="col-md-3"> 
							<select class="form-control combo_tipo_de_servico">
								<option value="">Tipo de serviço</option>
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
	        </div>
        </div>


	    

    </div>

	<div style="clear:both;"></div>

    <?php include("webparts/rodape.php"); ?>

    </div>
  </body>
  
</html>