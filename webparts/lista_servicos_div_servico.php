<?php 
	$servico = $_GET['servico']; 
	$data_nascimento = $servico["data_nascimento"];


//	$array = php explode ("-")
//	$data_nascimento = ;
//	$mes = $array[0];
//	$ano = "2013";
//	$dia = "2";

	/*echo $dia;
	echo $mes;
	echo $ano;

	echo "Data completa: ".$data_nascimento."\n";
	// Exibe somente o dia da data
	echo "Dia da data: ".$aux2[0]."\n";
	// Exibe somente o mês da data
	echo "Mês da data: ".$aux2[1]."\n";
	// Exibe somente o ano da data
	echo "Ano da data: ".$aux2[2]."\n";*/
?>


<div class="servico abrir_quebra_galho" <?php echo  "id='" . $servico["id_servico"] . "'"; ?>> 
	<div class="servico2">
		<div class="servico_img">
			<?php echo '<img class="img-responsive" src="'.$servico["img_url"].'"/>'; ?>
		</div>

		<div class="servico-conteudo">
			<h3 class="servico_nome"> <?php echo $servico["nome"]; ?></h3> 
				
			<h4 class="servico_emprego"> <?php echo $servico["emprego"]; ?> </h4>
			
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
</div>