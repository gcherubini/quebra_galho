<?php 
	$json = $_GET['servico'];
?>


<div class="row itens_painel">
						 
 	<div class="servico_img_painel col-xs-12 col-sm-2 col-md-2">
		<a href="#"><?php echo '<img class="img-responsive" src="'.$json["img_url"].'"/>'; ?></a>
	</div>

  	<div class="main_content_painel col-xs-8 col-sm-8 col-md-8">
  		<a href="#"><h4> <?php echo $json["nome"]; ?> </h4></a>
  		<h5> Serviço interessado: <?php echo $json["emprego"]; ?></h5> 
		<h5> Negociação iniciada em: xx/xx/xxxx </h5>
		<h5> Fone: <?php echo $json["tel_contato"]; ?> - Celular: <?php echo $json["cel_contato"]; ?> </h5>
		<h5> E-mail: <?php echo $json["email"]; ?> </h5>
  	</div>

  	<div class="negociacao_botoes col-xs-4 col-sm-2 col-md-2">
  		<?php if($json["negociacao_finalizada"] == "1"){ ?>
			<p> Negocicação finalizada e avaliada </p>
		<?php } else{ ?>
			<p> Serviço já foi realizado? </p>
  			<a  <?php echo  "id='".$json["id_servico"]."-".$json["contratado"]."'"; ?>  class="solicitar_avaliacao_como_prestador btn btn-primary">Solicitar Avaliação</a>
		<?php }	?>

  		
  	</div>


</div>