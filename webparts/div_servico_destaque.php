<?php 
	$servico = $_GET['servico']; 
?>


<div class="row service_item">
  <div class="col-md-3 service_item_thumb"> 
  	<?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?> 
  </div>
  <div class="col-md-9 service_item_content">
		<h3> <?php echo $servico["nome"]; ?> (<?php echo $servico["idade"]; ?> anos) </h3>
		<p> "<?php echo $servico["slogan"]; ?>" </p>
		<h4> <?php echo $servico["categoria"]; ?> </h4>
		
		<div class="row">
			<div class="col-md-4"> <b> Valor hora: </b> R$ 100,00 </div>
			<div class="col-md-4"> <b> Tempo no mercado: </b> 10 anos </div>
		</div>
		
		
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
  </div>
</div>