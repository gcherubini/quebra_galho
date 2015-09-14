<?php 
	$servico = $_GET['servico']; 
?>


<div class="col-md-3 servico"> 
	<div class="servico_espacamento">
		<div class="row servico_img">
			<?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?>
		</div>

		<div class="row servico_titulo">
			<div class="col-md-12"> <h3> <?php echo $servico["nome"]; ?> (<?php echo $servico["idade"]; ?> anos)</h3> </div>
		</div>		
		<div class="row servico_detalhe">
			<div class="col-md-12"> <p>"<?php echo $servico["slogan"]; ?>"</p> </div>
		</div>
		<div class="row servico_titulo">
			<div class="col-md-12"> <h4> <?php echo $servico["emprego"]; ?> </h4> </div>
		</div>

		<div class="row servico_detalhe">
			<div class="col-md-6"> <b> Valor hora: </b>  </div>
			<div class="col-md-6"> <b> Serviços realizados: </b>  </div>
		</div>

		<div class="row servico_detalhe">
			<div class="col-md-6">  R$ 50,00 </div>
			<div class="col-md-6">  5 </div>
		</div>

		<div class="row servico_detalhe"> 
			<div class="col-md-12"> <b> Tempo no mercado: </b> 10 anos </div>
		</div>

		<div class="row servico_detalhe"> 
			<div class="col-md-12">
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
	</div>
</div>