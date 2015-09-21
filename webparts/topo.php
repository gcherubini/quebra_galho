<script>
$().ready(function() {
	$('.logout').click(function() {
	     	$.ajax({
		        url: 'backend/logout.php',
		        success : function() {
		        	window.location.reload(true);
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			        alert("Erro ao deslogar!");
			    }
		    });

	});
});


</script>

<div class="topo1">
	
	<div class="container header_div_top_right"> 
			<a href="ajuda.php" > Ajuda </a>
			<span class="glyphicon glyphicon-menu-right"></span>
			
			<?php if (isset($_SESSION['id_usuario'])) { ?>
				<a class="logout"> Sair</a>
				<a href="painel_usuario.php"> <?php echo $_SESSION['nome']; ?> </a>
			<?php } else { ?>
	 	  		<a href="login.php"> Entrar</a>
				<a href="novo_usuario.php"> Cadastre-se</a>
 			<?php } ?>
			
	</div>
	
</div>

<div class="topo2">
	<div class="container">
		<div class="col-md-2">
			<div class="logo">
			</div>
		</div>
		<div class="col-md-10">
			
			<ul class="menu">
				<a href="index.php"><li class="activate"> Inicio </li></a>
				<a href="novo_servico.php"><li>Publicar</li></a>
				<a href="sobre.php"><li>Sobre</li></a>
			</ul>
		</div>
	</div>
</div>



<div class="topo3">

</div>


