<?php 
	$servico = $_GET['servico']; 
?>


<div class="row itens_painel">

	<div class="servico_img_painel col-xs-12 col-sm-2 col-md-2">
		<a href="quebra_galho_perfil.php?id_servico=<?php echo $servico["id_servico"];?>"><?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?></a>
	</div>

	<div class="main_content_painel col-xs-8 col-sm-8 col-md-8">
		<a href="quebra_galho_perfil.php?id_servico=<?php echo $servico["id_servico"];?>"><h4> <?php echo $servico["emprego"]; ?> </h4></a>
		<p> "<?php echo $servico["slogan"]; ?>" </p>
		<p> <b>Número de serviços: </b> <?php echo $servico["numero_servicos"]; ?> (<a href="painel_usuario_negociacoes.php">Ver</a>)</p>
		<p>0 Avaliações - PLACEHOLDER (<a href="#">Ver</a>)</p>
	</div>

	<div class="painel_item_botoes col-xs-12 col-sm-2 col-md-2">
		<!--<p>
			<a href="" class="editar_servico">Editar informações do serviço</a>
		</p>-->

		<a  href="quebra_galho_perfil.php?id_servico=<?php echo $servico["id_servico"];?>" class="btn btn-primary">Ver Anúncio</a>
	
		<a  <?php echo  "id='" . $servico["id_servico"] . "'"; ?> href="" class="deletar_servico btn btn-danger">Apagar anúncio</a>
		

  	</div>

</div>