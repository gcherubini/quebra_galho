<?php 
	$servico = $_GET['servico']; 
?>


<div class="servico servico_destaque abrir_quebra_galho" <?php echo  "id='" . $servico["id_servico"] . "'"; ?>> 
	<div class="servico_destaque_img servico_img">
	  		<?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?> 
	</div>

	<div class="servico_destaque_content">

			<h3 class="destaque_nome"> <?php echo $servico["nome"]; ?></h3> 

			<h4 class="destaque_emprego"> <?php echo $servico["emprego"]; ?> </h4> 

			<h5>(<?php echo $servico["idade"]; ?> anos)</h5>
			

			<p>"<?php echo $servico["slogan"]; ?>"</p> 
			
			<!--

			<p> <b>Numero de serviços: </b> <?php echo $servico["numero_servicos"]; ?></p> 

			!-->

			<p>
				<?php
					$totalEstrelas = 5;
					$usuarioEstrelas = $servico["estrelas"];

					if($usuarioEstrelas>0){
						echo "<b> Reputação: </b>";
						for($i = 0; $i < $servico["estrelas"]; $i++){
						echo "<span class='glyphicon glyphicon-star'> </span>";
						}
						for($i = 0; $i < $totalEstrelas-$servico["estrelas"]; $i++){
							echo "<span class='glyphicon glyphicon-star-empty'> </span>";
						}
					}
				?>
			</p>
	</div>
</div>