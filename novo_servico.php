<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION['id_usuario'])){
	$fileName = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	header("location: login.php?pAnt=" . $fileName);
	exit;
}
$id_usuario = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : 0;
echo "<script> var id_usuario = $id_usuario; </script>";
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

 		if(id_usuario == 0) {
			$.redirect("voce_precisa_de_uma_conta.php"); 
		}

		carregaComboEmprego();
		

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
				estado: {
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
				estado: {
					required: "Por favor nos diga a localidade do seu serviço"
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
		        	//alert(json_result)
		        	//console.log(json_result)
		           
		            $.each(json_result, function(index, json_result) {	
            			$('.combo_emprego').append("<option>" + json_result.emprego + "</option>");
	        		});
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

	
<?php include("webparts/topo.php"); ?>

    <div class="container">	
    	<?php include("webparts/resultado_de_operacoes.php"); ?>
    	
    	<div class="publicar_servico">
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
						<input placeholder="Cidade(s) de atuação" type="text" class="form-control" id="cidade" name="cidade" maxlength="40">
					
						<button type="submit" class="btn btn-primary btn-block">Publicar</button>

					</form>

					<div class="esqueceu-senha">
						<a  href="contato.php" role="button">Não encontrou sua categoria? </a>
					</div>

				</div>
			</div>
		</div>

		 <?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>
	
  </body>
</html>