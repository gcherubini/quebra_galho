<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("webparts/head_imports.php"); ?>
   <title>Bootstrap 101 Template</title>

	<?php include("webparts/head_imports.php"); ?>
 
 	<script type="text/javascript">

 	var erroMsg = "Aconteceu um erro ao salvar seu usuário, tente mais tarde!";
 	var sucessoMsg = "Usuário salvo com sucesso, obrigado!";

	$(function() {
		$(form).submit(function() {
		   	$.ajax({
			        type : 'POST',
			        dataType : 'text',
			        data: $(form).serialize(),
			        url: 'backend/novo_usuario.php',
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

		    return false; // avoid to execute the actual submit of the form.
		});	 	
	});

	function erroSalvarDB(error){
		alert(erroMsg);
		$(form)[0].reset();
		alert(error);
	}

	function sucessoSalvarDB(error){
		alert(sucessoMsg);
	}


	</script>

  </head>
  <body>

	

    <div class="container">

		<?php include("webparts/header.php"); ?>
		
		<div class="page-header">
		   <h2> Inscrever-se </h1>
		</div>

		<p> Se cadastre no nosso website para poder contratar um serviço ou oferecer um serviço: </p> 

		<form id="form" class="form-horizontal" >

			<div class="row">
				  <div class="col-sm-6">
				  		<div class="col-sm-4">
				  			<label for="input_nome" class="control-label">Nome</label>
				  		</div>
				  		 <div class="col-sm-8">	
					   		<input type="text" class="form-control" id="input_nome" name="nome">
						</div>
				   </div>
				   <div class="col-sm-6">
				   		<div class="col-sm-4">
				  			<label for="input_sobrenome" class="control-label">Sobrenome</label>
				  		</div>
				  		 <div class="col-sm-8">	
					   		<input type="text" class="form-control" id="input_sobrenome" name="sobrenome">
						</div>
				  </div>
			</div>
				
			<div class="row">		  
				  <div class="col-sm-6">
				  		<div class="col-sm-4">
				  			<label for="input_estado" class="control-label">Estado</label>
				  		</div>
				  		 <div class="col-sm-8">	
					   		<select id="input_estado" name="estado" class="form-control combo_tipo_de_servico">
								<option value="">Selecione seu estado</option>
								<option value="RS">RS</option>
								<option value="SP">SP</option>
							</select>
						</div>
				  </div>
				   <div class="col-sm-6">
				   		<div class="col-sm-4">
				  			<label for="input_cidade" class="control-label">Cidade</label>
				  		</div>
				  		 <div class="col-sm-8">	
					   		<input type="text" class="form-control" id="input_cidade" name="cidade">
						</div>	   		
				  </div>
			</div>

			<div class="row">		  
				  <div class="col-sm-6">
				  		<div class="col-sm-4">
				  			<label for="input_idade" class="control-label">Idade</label>
				  		</div>
				  		 <div class="col-sm-8">	
					   		<input type="text" class="form-control" id="input_idade" name="idade">
						</div>
				  </div>
				   <div class="col-sm-6">
				   		<div class="col-sm-4">
				  			<label for="input_sexo" class="control-label">Sexo</label>
				  		</div>
				  		 <div class="col-sm-8">	
					   		<select id="input_sexo" name="sexo" class="form-control combo_tipo_de_servico">
								<option value="">Selecione</option>
								<option value="M">Masculino</option>
								<option value="F">Feminino</option>
							</select>
						</div>	   		
				  </div>
			</div>



			<!-- <p class="centered" style="float:left; margin-left:20px;"> Envie uma foto sua profissional na qual <br> será visualizada em seus anúncios </p> -->
			<div class="row">		  
				  <div class="col-sm-6">
				  		<div class="col-sm-4">
				  			<label for="cropContainerMinimal" class="col-sm-2 control-label">Foto</label>
				  		</div>
				  		<div class="col-sm-8">	
					   		<div id="cropContainerMinimal" class="div_crop_foto_usuario"></div>					
						</div>	   	
				  </div>
			</div>

					
			
					 

					 
					<div class="form-group">
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Publicar !</button>
					  </div>
					</div>
					

		</form>
    </div>



    <script>
	
		var croppicContaineroutputMinimal = {
				uploadUrl:'libraries/croppic/img_save_to_file.php',
				cropUrl:'libraries/croppic/img_crop_to_file.php', 
				modal:false,
				doubleZoomControls:true,
				enableMousescroll:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
		}
		var cropContaineroutput = new Croppic('cropContainerMinimal', croppicContaineroutputMinimal);
		
		
	</script>
	
  </body>
</html>