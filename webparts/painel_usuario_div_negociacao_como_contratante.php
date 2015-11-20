<?php 
	$servico = $_GET['servico'];
?>

<div class="row itens_painel">
 
 	<div class="servico_img_painel col-xs-12 col-sm-2 col-md-2">
		<a href="quebra_galho_perfil.php?id_servico=<?php echo $servico["id_servico"];?>"><?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?></a>
	</div>

  	<div class="main_content_painel col-xs-8 col-sm-8 col-md-8">
  		<a href="quebra_galho_perfil.php?id_servico=<?php echo $servico["id_servico"];?>"><h4> <?php echo $servico["nome"]; ?> </h4></a>
		<h5> <?php echo $servico["emprego"]; ?> </h5>
		<h5> Fone: <?php echo $servico["tel_contato"]; ?> - Celular: <?php echo $servico["cel_contato"]; ?> </h5>
		<h5> E-mail: <?php echo $servico["email"]; ?> </h5>
  	</div>
   	
   	<div class="negociacao_botoes col-xs-4 col-sm-2 col-md-2">
		

		<?php if($servico["negociacao_finalizada"] == "1"){ ?>
			<p> Negocicação finalizada e avaliada </p>
		<?php } else{ ?>
			<p> Serviço já foi prestado? </p>
			<a  <?php echo  "id='".$servico["id_servico"]."-".$servico["contratado"]."'"; ?>  class="finalizar_negociacao_como_contratante btn btn-danger">Avaliar Serviço</a>
		<?php }	?>
			
		
  	</div>

</div>
