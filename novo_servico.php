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
   <title>Quebra-Galho</title>

	<?php include("webparts/head_imports.php"); ?>
 
 	<script type="text/javascript">

 	var erroMsg = "Aconteceu um erro ao salvar seu serviço, tente mais tarde!";
 	var sucessoMsg = "Seu serviço foi salvo com sucesso, obrigado!";

 	$().ready(function() {

 		ativaMenu("#menu_publicar");

		carregaComboEmprego();
		carregaComboCidade();
		

		$('.telefone').mask('(00) 0000-0000');

		$("#form").validate({
			rules: {
				emprego: {
					required: true
				},
				slogan: {
					maxlength: 100
				},
				descricao: {
					required: true,
					maxlength: 900
				},
				cidades: {
					required: true
				},
				telefone: {
					required: true
				}
			},
			messages: {
				emprego: {
					required: "Por favor, selecione uma categoria"
				},
				slogan: {
					maxlength: "Seu slogan deve contar no máximo 100 caracteres"
				},
				descricao: {
					required: "Por favor, descreva seu serviço",
					maxlength: "A descrição do seu serviço não pode ser tão grande"
				},
				cidades: {
					required: "Por favor, escolha pelo menos uma cidade de atuação"
				},
				telefone: {
					required: "Por favor digite seu telefone para contato"
				}
			}
		});	
	});

	$.validator.setDefaults({
			submitHandler: function() {
			    $.ajax({
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
			    });
				
			}
		});

	
	

	function carregaComboEmprego(){
		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        url: 'backend/emprego_busca.php',
		        async: false,
		        success : function(json_result) {
		        	//alert(JSON.stringify(json_result));
		           
		            $.each(json_result, function(index, json_result) {	
            			$('.combo_emprego').append("<option>" + json_result.emprego + "</option>");
	        		});
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    } 
		    });
	}

	function carregaComboCidade(){
		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        data: ({sql: "SELECT * FROM cidade where estado = '23'"}) ,
		        url: 'backend/busca_db_simples.php',
		        async: false,
		        success : function(json_result) {
		        	//alert(JSON.stringify(json_result));

		            $.each(json_result, function(index, json_result) {	
            			$('.combo_cidade').append("<option>" + json_result.nome + "</option>");
	        		});

	        		$(".combo_cidade").chosen({no_results_text: "Oops, nenhuma cidade encontrada!"}); 

		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    } 
		    });
	}



	function erroSalvarDB(error){
		alert(erroMsg);
		$(form)[0].reset();
		alert(error);
	}

	function sucessoSalvarDB(error){
		//alert(sucessoMsg);
		window.location.href = "painel_usuario_servicos.php";
	}


	</script>

  </head>
  <body>
  	<div class="page">
			
		<?php include("webparts/topo.php"); ?>

		    <div class="container content">	
		    	<?php include("webparts/resultado_de_operacoes.php"); ?>
		 			    
			    	<div class="row row-centered">
			    		<div class="col-xs-12 col-sm-6 col-md-6 col-centered">
					    	<div class="form-box">
					    		<div class="form-box-header">
									<h1 class="form-box-title"> Publicar serviço </h1>
								</div>

								<div class="form-box-main">
									<p>Adicione informações relacionadas ao serviço prestado:</p> 
									<form id="form" class="form-horizontal" >
									  
										<select class="form-control combo_emprego" id="emprego" name="emprego">
											<option value="">Selecione uma categoria</option>
										</select>
										<input placeholder="Crie um slogan (Máx. 100 caracteres)" type="text" class="form-control" id="slogan" name="slogan">
										<textarea placeholder="Descreva suas habilidades (Máx. 180 caracteres)" class="form-control" rows="3" id="descricao" name="descricao" maxlength="180"></textarea>
										<br>
										<select  class="form-control combo_cidade chosen-select" id="cidades" name="cidades[]" multiple
										 		data-placeholder="Cidade(s) de atuação" >
												<option> Remotamente/Não-presencial </option>
										</select>

										<input placeholder="Telefone para contato" type="text" class="form-control telefone" id="telefone" name="telefone" >
										
										<button type="submit" class="btn btn-primary btn-block">Publicar</button>

									</form>

									<div class="esqueceu-senha">
										<a  href="contato.php" role="button">Não encontrou sua categoria? </a>
									</div>

								</div>
							</div>
						</div>
					</div>
				

				 <?php include("webparts/pagina_nao_encontrada.php"); ?>
		    </div>

		    <?php include("webparts/rodape.php"); ?>
	</div>
  </body>
</html>