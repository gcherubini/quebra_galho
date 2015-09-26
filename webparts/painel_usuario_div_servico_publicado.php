<?php 
	$servico = $_GET['servico']; 
?>


<div class="row ">
  
  <div class="col-md-10">
		<h4> <?php echo $servico["emprego"]; ?> </h4>
		<p> "<?php echo $servico["slogan"]; ?>" </p>
  </div>
   <div class="col-md-2">
		<p>
			<a href="" class="editar_servico">Editar informações do serviço</a>
		</p>
		<p> 
			<a  <?php echo  "id='" . $servico["id_servico"] . "'"; ?> href="" class="deletar_servico">Deletar serviço</a>
		</p>
  </div>

</div>
