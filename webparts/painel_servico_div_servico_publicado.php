<?php 
	$servico = $_GET['servico']; 
?>


<div class="row ">
  
  <div class="col-md-10">
		<h4> <?php echo $servico["emprego"]; ?> </h4>
		<p> "<?php echo $servico["slogan"]; ?>" </p>
		<p> <?php echo $servico["descricao"]; ?> </p>
  </div>
   <div class="col-md-2">
		<p>
			<a href="" class="editar_servico">Editar</a>
		</p>
		<p> 
			<a  <?php echo  "id='" . $servico["id_servico"] . "'"; ?> href="" class="deletar_servico">Deletar</a>
		</p>
  </div>

</div>
