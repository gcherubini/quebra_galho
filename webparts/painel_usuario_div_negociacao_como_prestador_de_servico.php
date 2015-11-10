<?php 
	$servico = $_GET['servico'];
?>

<style>
	.itens_painel {
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
	.main_content_painel {
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


<div class="row itens_painel">
						 
 	<div class="servico_img_painel col-xs-12 col-sm-2 col-md-2">
		<?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?>
	</div>

  	<div class="main_content_painel col-xs-8 col-sm-8 col-md-8">
  		<h4> <?php echo $servico["nome"]; ?> </h4>
  		<h5> Serviço interessado: <?php echo $servico["emprego"]; ?></h5> 
		<h5> Negociação iniciada em: xx/xx/xxxx </h5>
		<h5> Fone: <?php echo $servico["tel_contato"]; ?> - Celular: <?php echo $servico["cel_contato"]; ?> </h5>
		<h5> E-mail: <?php echo $servico["email"]; ?> </h5>
  	</div>

  	<div class="negociacao_botoes col-xs-4 col-sm-2 col-md-2">
  		<a  <?php echo  "id='".$servico["id_servico"]."-".$servico["contratado"]."'"; ?>  class="solicitar_negociacao_como_prestador btn btn-primary">Solicitar Negociação</a>
  	</div>


</div>