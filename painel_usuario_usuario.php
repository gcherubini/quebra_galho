<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if(!isset($_SESSION['id_usuario'])){
	$fileName = basename($_SERVER["SCRIPT_FILENAME"], '.php') . ".php";
	header("location: login.php?pAnt=" . $fileName);
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include("webparts/head_imports.php"); ?>
   <title>Quebra-Galho</title>


   <style type="text/css">
   	.ver_mais_avaliacoes{display: none;}
   </style>

   <script type="text/javascript"> 
   
	$().ready(function() {

		ativaMenuPainelUsuario("#painel_menu_usuario");
 		carregaUsuario();
 		carregaAvaliacoes();


		$(".data_nascimento").datepicker({
		    dateFormat: 'dd/mm/yy',
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});

	    $('.btn-edit').click(function() {
	    	$('.btn-edit').css("display","none")
	    	$('.btn-save').css("display","block")
	    	$('.btn-cancel').css("display","block")
	    	habilitaEdesabilitaInputs()
	    });

	    $('.btn-save').click(function() {
	    	$('.btn-edit').css("display","block")
	    	$('.btn-save').css("display","none")
	    	$('.btn-cancel').css("display","none")
	 		habilitaEdesabilitaInputs()
	    });
	    $('.btn-cancel').click(function() {
	    	$('.btn-edit').css("display","block")
	    	$('.btn-save').css("display","none")
	    	$('.btn-cancel').css("display","none")
	 		habilitaEdesabilitaInputs()
	    });
	});

	function habilitaEdesabilitaInputs(){
		$('.painel_usuario_main input').each(function() {
	            if ($(this).attr('disabled')) {
	                $(this).removeAttr('disabled');
	            }
	            else {
	                $(this).attr({
	                    'disabled': 'disabled'
	                });
	            }
	        });
	}


	function carregaUsuario(){
		$.ajax({
		    //type : 'POST',
		    //data: ({attr: value}) ,
		    dataType : 'json',
		    url: 'backend/usuario_busca.php',
		    success : function(json_result) {
		    	//alert(JSON.stringify(json_result));
		    	if(valorEhVazio(json_result)) {
		    		erroAoCarregarUsuario()
		    	}
		    	else{
		    		populaUsuarioNaTela(json_result[0]);
		    	}
		    },
		    error: function(XMLHttpRequest, textStatus, errorThrown){
		    	erroAoCarregarUsuario()
		    } 
	    });
	}

	function carregaAvaliacoes(){
		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        url: 'backend/avaliacao_busca.php',
		        async: false,
		        success : function(json_result) {
		        	//alert(json_result)
		        	//console.log(json_result)
		            // need to test in IE
		            var countJsonItens = Object.keys(json_result).length 

		 			if(countJsonItens == 0) {
	 					mostraMensagemDeNenhumaAvaliacaoCadastrada()
		 			}
		 			else {
	            		$.each(json_result, function(index, json_result) {	
	            			populaAvaliacao(json_result);
		        		});
			        }

		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
					mostraMensagemDeNenhumaAvaliacaoCadastrada();	
			    	//alert("error: " + textStatus);
			    } 
		    });
	}


	function populaUsuarioNaTela(json_result){
		$(".perfil_info").css('display','block');
		$(".data_nascimento").val($.datepicker.formatDate('dd/mm/yy', new Date(json_result.data_nascimento)));
		$(".email").val(json_result.email);
		
		/*$(".senha").val(json_result.senha);*/
			
	}

	function populaAvaliacao(json_result){
		var url_div = "webparts/painel_usuario_div_avaliacao_publ.php";
		var url_div_sucess = ".avaliacoes";
		
		$.ajax({
		    type : 'GET',
		    dataType : 'text',
		    url: url_div,
		    data: ({json: json_result}),
		    async: false,
		    success : function(div_result) {
		    	$(url_div_sucess).append(div_result);
		    } 
		});	
	}

	function mostraMensagemDeNenhumaAvaliacaoCadastrada(){
		$('.avaliacoes_nao_encontradas').css("display","block");
	}

	function erroAoCarregarUsuario(){
		mostraResultadoOperacoes(false, "Ops... Aconteceu um erro inesperado ao carregar algumas informações do seu perfil, tente entrar mais tarde...");
	}


 	</script>



  </head>
  <body>
  	<div class="page">
		<?php include("webparts/topo.php"); ?>

	    <div class="container content">

	    

	<?php
		if (isset($_SESSION['id_usuario'])) {
	 ?>		

	 		<?php include("webparts/painel_usuario_menu.php"); ?>

	 		<div class="painel_usuario_main">

	 				

					<p> Olá <b> <?php echo $_SESSION["nome"]; ?></b>, seja bem-vindo(a) ao Painel do Usuário. </p>

					<p> Para ver o seu perfil público <id class="ver_perfil_publico"><a href="#"> Clique Aqui. </a> </id> </p>


					</p>

					<p>
						Aqui você encontra um resumo sobre o seu perfil, onde pode modificar algumas informações pessoais e configurações da sua conta.
					</p>

				<?php include("webparts/resultado_de_operacoes.php"); ?>

			<div class="perfil_info">
				<h2> Meu Perfil </h2>

					<p>
						Nome: <?php echo $_SESSION["nome"]; ?>
					</p>

					<p>
						Data de Nascimento: <input name="data_nascimento" class="form-control data_nascimento" type='text' disabled value=""></input>
					</p>

					<p>
						E-mail: <input name="email" class="form-control email" type='text' disabled value=""></input>
					</p>

					<p>
						Senha: <input name="password" class="form-control password" type='password' disabled value="xxxxxx"></input>
					</p>

					<!--<p>
						Telefone: <input name="telefone" class="form-control telefone" type='text' disabled value=""></input>
					</p>-->

					<!-- <p>
						Endereço: <input name="endereco" class="form-control endereco" type='text' disabled value="R. Grande, 123"></input>
					</p>-->

					<div class="btn btn-default btn-edit left">Editar</div>

					<div class="btn btn-default btn-save left">Salvar</div>

					<div class="btn btn-default btn-cancel left">Cancelar</div>

					<div style="clear:both;"></div>

				<h2> Avaliações </h2>

					

					<div class="reputacao_geral"> <p>
						Sua reputação geral: <id class="glyphicon glyphicon-star reputacao_estrelas"> </id>

					</p>

				</div>

					<p>
						
						Últimas avaliações sobre seus serviços:

					</p>

					<div class="avaliacoes">
						
					</div>
						
					
					<div class="ver_mais_avaliacoes"><a href="#">Ver mais avaliações</a> </div>
					
				

					<div class="itens_nao_encotrados avaliacoes_nao_encontradas">
						<p> Você ainda não possui nenhuma avaliação. </p>
					</div>



				<h2> Meus Anúncios </h2>

					<p>
						Você possui X anúncios cadastrados.
					</p>

					<p>
						<a href="#">Ver meus anúncios</a> - <a href="#">Promova agora o seu anúncio!</a>
					</p>

				<h2> Minhas Negociações </h2>

					<p>
						X usuários já solicitaram o seu contato para negociar.
					</p>

					<p>
						<a href="painel_usuario_negociacoes.php">Ver minhas negociações</a>
					</p>

				<h2> Configurações da Conta </h2>

					<p>
						Gostaria de receber notificações no meu email (s/n)
					</p>

					<p>
						Gostaria de receber ofertas do quebra-galho no meu email (s/n)
					</p>

					<p>
						<a href="#">Deletar conta</a>
					</p>

		</div>
	</div>
	<?php
		} else {
		  include("webparts/div_voce_precisa_se_logar.php"); 
		}
	?>		
						
				<?php include("webparts/pagina_nao_encontrada.php"); ?>
	    </div>

	     <?php include("webparts/rodape.php"); ?>
	</div>
  </body>
</html>