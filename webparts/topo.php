<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<script>
$().ready(function() {
	
	
	<?php if (isset($_SESSION['id_usuario'])) {?>
	checaSeUsuarioTemNovasNotificacoes()
	<?php }?>
	

	$('.logout').click(function() {
	     	$.ajax({
		        url: 'backend/logout.php',
		        success : function() {
		        	window.location.href = "index.php";
		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			        alert("Aconteceu algum erro ao sair da sua conta... Por favor tente mais tarde!");
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
				<a href="painel_usuario_usuario.php"> <?php echo $_SESSION['nome']; ?> </a>
				<a href="painel_usuario_notificacoes.php" class="notificacao-icon"> <span class="glyphicon glyphicon-exclamation-sign "> </span>  </a>
			<?php } else { ?>
	 	  		<a href="login.php"> Entrar</a>
				<a href="usuario_novo.php"> Cadastre-se</a>
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
				<a href="index.php"><li id="menu_inicio"> Inicio </li></a>
				<a href="novo_servico.php"><li id="menu_publicar">Publicar</li></a>
				<a href="sobre.php"><li id="menu_sobre">Sobre</li></a>
			</ul>
		</div>
	</div>
</div>



<div class="topo3">

</div>


