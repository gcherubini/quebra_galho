<?php 
	$servico = $_GET['servico']; 
?>

<style>
	.item_servicos {
		border: 1px solid #e5e5e5;
		margin-bottom: 10px;
	}
	.servico_img_painel {
		float: left;
		padding-top: 10px;
	}
	.servico_img_painel img {
		width: 140px;
		height: 100px;
	}
	.servico_main_painel {
		float: left;
		height: 120px;
	}
	.botao_remover_painel {
		float: right;
		height: 100px;
		padding-top: 40px;
		text-align: center;
	}
</style>

<div class="row item_servicos">

	<div class="servico_img_painel col-xs-12 col-sm-2 col-md-2">
		<?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?>
	</div>

	<div class="servico_main_painel col-xs-8 col-sm-8 col-md-8">
		<h4> <?php echo $servico["emprego"]; ?> </h4>
		<p> "<?php echo $servico["slogan"]; ?>" </p>
		<p> <b>Número de serviços: </b> <?php echo $servico["numero_servicos"]; ?> (<a href="painel_usuario_negociacoes.php">Ver</a>)</p>
		<p>0 Avaliações - PLACEHOLDER (<a href="#">Ver</a>)</p>
	</div>

	<div class="botao_remover_painel col-xs-4 col-sm-2 col-md-2">
		<!--<p>
			<a href="" class="editar_servico">Editar informações do serviço</a>
		</p>-->
		<p> 
			<a  <?php echo  "id='" . $servico["id_servico"] . "'"; ?> href="" class="deletar_servico btn btn-danger">Apagar serviço</a>
		</p>
  	</div>

</div>