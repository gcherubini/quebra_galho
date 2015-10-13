<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>

<script>
$().ready(function() {
	
	
	<?php if (isset($_SESSION['id_usuario'])) {?>
	checaSeUsuarioTemNovasNotificacoes()
	<?php }?>
	


	$('.botao_procura_topo').click(function() {
		window.location.href = "index.php?pesquisa=" + $('.input_texto_pesquisar_topo').val() ;
	});
	$('.input_texto_pesquisar_topo').keyup(function(e){
	    if(e.keyCode == 13)
	    { //enter key
	     	window.location.href = "index.php?pesquisa=" + $('.input_texto_pesquisar_topo').val() ;  
	    }
	});

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

	var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( ".input_texto_pesquisar_topo" ).autocomplete({
      source: availableTags
    });
});


</script>

<div class="topo_fixed" data-spy="affix" data-offset-top="200">

	<div class="topo1">
		
		<div class="container header_div_top_right"> 
				<a href="ajuda.php" >Ajuda </a>
				<span class="glyphicon glyphicon-menu-right"></span>
				
				<?php if (isset($_SESSION['id_usuario'])) { ?>
					<a class="logout"> <span class="glyphicon glyphicon-remove-sign">&nbsp</span>Sair</a>
					<a href="painel_usuario_usuario.php"><span class="glyphicon glyphicon-user">&nbsp</span><?php echo $_SESSION['nome']; ?> </a>
					<a href="painel_usuario_notificacoes.php" class="notificacao-icon"> <span class="glyphicon glyphicon-exclamation-sign "> </span>  </a>
				<?php } else { ?>
		 	  		<a href="login.php"><span class="glyphicon glyphicon-ok">&nbsp</span>Entrar</a>
					<a href="novo_usuario.php"><span class="glyphicon glyphicon-pencil">&nbsp</span>Cadastre-se</a>
	 			<?php } ?>
				
		</div>
		
	</div>

	<div class="topo2" >
		<div class="container">
			
			<div class="left">
				<div class="logo">
				</div>
			</div>

			<div class="left">
				<ul class="menu">
					<a href="index.php"><li id="menu_inicio"> Inicio </li></a>
					<a href="novo_servico.php"><li id="menu_publicar">Publicar</li></a>
					<a href="sobre.php"><li id="menu_sobre">Sobre</li></a>
				</ul>
			</div>

			<div class="right topo2_direita" >
				<input type="text" class="form-control input_texto_pesquisar_topo" placeholder="Pesquisar por...">
				<span class="glyphicon glyphicon-search botao_procura_topo"> </span>
			</div>

			
		</div>
	</div>

</div>


<div class="topo3">

</div>


