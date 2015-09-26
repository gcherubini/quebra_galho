<?php 
	$servico = $_GET['servico']; 
?>


<div class="row ">
  
  <div class="col-md-10">
  		<h4> <?php echo $servico["nome"]; ?> </h4>
		<h5> <?php echo $servico["emprego"]; ?> </h5>
  </div>
   <div class="col-md-2">
		<p> 
			<a  <?php echo  "id='" . $servico["id_servico"] . "'"; ?> href="" class="finalizar_negociacao">Finalizar negociação</a>
		</p>
  </div>

</div>
