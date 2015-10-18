<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>


<?php include("webparts/modal.php"); ?>


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

<div class="topo_fixed">

	<div class="topo1">
		
		<div class="container header_div_top_right"> 
				<a href="ajuda.php" >Ajuda </a>
				<span class="glyphicon glyphicon-menu-right"></span>
				
				<?php if (isset($_SESSION['id_usuario'])) { ?>
					<a href="#" class="logout">Sair</a>
					<a href="painel_usuario_usuario.php"><?php echo $_SESSION['nome']; ?> </a>
					<a href="painel_usuario_notificacoes.php" class="notificacao-icon"> <span class="glyphicon glyphicon-exclamation-sign "> </span>  </a>
				<?php } else { ?>
		 	  		<a href="login.php">Entrar</a>
					<a href="novo_usuario.php">Cadastre-se</a>
	 			<?php } ?>
				
		</div>
		
	</div>

	<div class="topo2" >
		<div class="container">
			

			<div class="row" >
			<!-- xs phone sm tablet md desktop -->
		        
		        <div class="col-xs-12 col-sm-2 col-md-2 minha_conta_div">
		        	

		        	<a href="painel_usuario_usuario.php"> 
					<div class="minha_conta">
						<span class="glyphicon glyphicon-user">&nbsp</span> 
						<p> Minha Conta </p>
					</div>
					</a>

		        </div>

		        <div class="col-xs-12 col-sm-5 col-md-5">
					<ul class="menu">
						<a href="index.php"><li id="menu_inicio"> Inicio </li></a>
						<a href="novo_servico.php"><li id="menu_publicar">Publicar</li></a>
						<a href="ajuda.php"><li id="menu_ajuda">Ajuda</li></a>
					</ul>

		        </div>

		        
		        <div class="col-xs-12 col-sm-5 col-md-5"> 
		        	<div class="input-group">
			          <input type="text" class="form-control input_texto_pesquisar_topo" placeholder="Encontre e contrate um serviço...">
			          <div class="input-group-btn">
			            <button type="button" class="btn btn-default botao_procura_topo" aria-label="Buscar"><span class="glyphicon glyphicon-search "></span></button>
			          </div>
			        </div> 
		        	</div>
		    	</div>

		   	 

			<!--<div class="topo2_esquerda">
				<div class="logo">
				</div>
			</div>-->

			
	

		</div>
	</div>

</div>




