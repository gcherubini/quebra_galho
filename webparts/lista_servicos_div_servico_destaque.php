<?php 
	$servico = $_GET['servico']; 
?>


<div class="row servico abrir_quebra_galho" <?php echo  "id='" . $servico["id_servico"] . "'"; ?>> 
  <div class="col-md-3 servico_img"> 
  	<?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?> 
  </div>
  <div class="col-md-9">
		<h3> <?php echo $servico["nome"]; ?> (<?php echo $servico["idade"]; ?> anos) </h3>
		<p> "<?php echo $servico["slogan"]; ?>" </p>
		<h4> <?php echo $servico["emprego"]; ?> </h4>
		
		<p>
			<?php
				$totalEstrelas = 5;
				$usuarioEstrelas = $servico["estrelas"];

				if($usuarioEstrelas>0){
					echo "<b> Qualidade de serviço: </b>";
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