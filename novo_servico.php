<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
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

		buscaEcarregaComboEmprego();
		

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
					required: "Por favor digite seu emprego"
				},
				slogan: {
					maxlength: "Seu slogan deve contar no máximo 100 caracteres"
				},
				descricao: {
					required: "Por favor descreva seu serviço",
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
			        url: 'backend/novo_servico.php',
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

	
	

	function buscaEcarregaComboEmprego(){
		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        url: 'backend/busca_empregos.php',
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
		window.location.href = "painel_usuario.php";
	}


	</script>

  </head>
  <body>

	
<?php include("webparts/topo.php"); ?>

    <div class="container">	
    	<?php include("webparts/resultado_de_operacoes.php"); ?>
    	
    	<div class="publicar_servico">
			<h1> Publicar serviço </h1>
			<p> Adicione informações relacionadas ao serviço prestado </p> 
			  <form id="form" class="form-horizontal" >
			  
				<div class="form-group">
				  <label for="emprego" class="col-sm-2 control-label">Emprego </label>
				  <div class="col-sm-10">
					<select class="form-control combo_emprego" id="emprego" name="emprego">
						<option value="">Selecione</option>
					</select>
				  </div>
				</div>

				<div class="form-group">
				  <label for="descricao" class="col-sm-2 control-label">Slogan</label>
				  <div class="col-sm-10">
				   <input type="text" class="form-control" id="slogan" name="slogan">
				  </div>
				</div>

				<div class="form-group">
				  <label for="descricao" class="col-sm-2 control-label">Descrição</label>
				  <div class="col-sm-10">
				   <textarea class="form-control" rows="3" id="descricao" name="descricao"></textarea>
				  </div>
				</div>

				
				<div class="row">		  
					  <div class="col-sm-6">
					  		<div class="col-sm-4">
					  			<label for="estado" class="col-sm-2 control-label">Estado</label>
					  		</div>
					  		 <div class="col-sm-8">	
						   		<select class="form-control" id="estado" name="estado">
									<option value="ALL">Para todo o Brasil</option>
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
					  </div>
					   <div class="col-sm-6">
					   		<div class="col-sm-4">
					  			<label for="cidade" class="control-label">Cidade</label>
					  		</div>
					  		 <div class="col-sm-8">	 		
						   		<input type="text" class="form-control" id="cidade" name="cidade">
							</div>	   		
					  </div>
				</div>	

				 
				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Publicar</button>
				  </div>
				</div>
			</form>
		</div>

		 <?php include("webparts/pagina_nao_encontrada.php"); ?>
    </div>

    <?php include("webparts/rodape.php"); ?>
	
  </body>
</html>