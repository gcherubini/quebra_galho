<?php
$json = isset($_GET['json']) ? $_GET['json'] : "";
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
				<a href="#"><img src ="img/usuarios/20_17-10-2015_07-32-08.jpg" class="foto_usuario"> </a>
			</div>

		  	<div class="main_content_painel col-xs-8 col-sm-8 col-md-8">
		  		<h4> <?php echo $json["nome"]; ?> </h4>
				<h5> Serviço avaliado: <id class="link_to_servico"><a href="#"><?php echo $json["emprego"]; ?></a></id>(Ver publicação) </h5>
				
				<h5> Estrelas:

				<?php
					$totalEstrelas = 5;
					$usuarioEstrelas = $json["numero_estrelas"];
					if($usuarioEstrelas>0){
						for($i = 0; $i < $usuarioEstrelas; $i++){
						echo "<span class='glyphicon glyphicon-star'> </span>";
						}
						for($i = 0; $i < $totalEstrelas-$usuarioEstrelas; $i++){
							echo "<span class='glyphicon glyphicon-star-empty'> </span>";
						}
					}
				?>

				</h5>

				
				<h5> Avaliação: <?php echo $json["descricao_do_servico"]; ?> </h5>
		  	</div>
		   	
		</div>
