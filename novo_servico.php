<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("webparts/head_imports.php"); ?>
   <title>Bootstrap 101 Template</title>

	<?php include("webparts/head_imports.php"); ?>
 
 	<script type="text/javascript">

 	var erroMsg = "Aconteceu um erro ao salvar seu serviço, tente mais tarde!";
 	var sucessoMsg = "Seu serviço foi salvo com sucesso, obrigado!";

	$(function() {
		$(form).submit(function() {
		   	$.ajax({
			        type : 'POST',
			        dataType : 'text',
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

		    return false; // avoid to execute the actual submit of the form.
		});	 	
	});

	function erroSalvarDB(error){
		alert(erroMsg);
		$(form)[0].reset();
		//alert(error);
	}

	function sucessoSalvarDB(error){
		alert(sucessoMsg);
	}


	</script>

  </head>
  <body>

	
<?php include("webparts/header.php"); ?>

    <div class="container">

<?php
	if (isset($_SESSION['id_usuario'])) {
   		// logged in
 ?>

		
		 <h2> Publicar serviço </h1>
		 <p> Adicione informações relacionadas ao serviço prestado </p> 

		  <form id="form" class="form-horizontal" >
			<div class="form-group">
			  <label for="inputPassword3" class="col-sm-2 control-label">Serviço prestado</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="inputPassword3" name="titulo">
			  </div>
			</div>

			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-2 control-label">Descreva o serviço</label>
			  <div class="col-sm-10">
			   <textarea class="form-control" rows="3" name="descricao"></textarea>
			  </div>
			</div>

			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-2 control-label">Tempo estimado de serviço</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="inputEmail3" name="tempo_estimado">
			  </div>
			</div>
			
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-2 control-label">Valor hora</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="inputEmail3" name="valor_servico_hora">
			  </div>
			</div>

			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-2 control-label">Imagem</label>
			  <div class="col-sm-10">
					<div class="col-lg-4 ">
						<div id="cropContainerMinimal"></div>
					</div>
					<div class="col-lg-8 ">
						<p class="centered" style="float:left; margin-left:20px;">Envie uma foto sua na qual será mostrada no seu anúncio </p>
					</div>
			  </div>
			</div>     
			 

			 
			<div class="form-group">
			  <div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Publicar !</button>
			  </div>
			</div>
			

		  </form>

	<?php
 	} else {
 	  include("webparts/div_voce_precisa_se_logar.php"); 
 	}
?>

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