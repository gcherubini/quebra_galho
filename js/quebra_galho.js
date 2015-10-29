function ativaMenu (idMenu) {
		$(idMenu).addClass("activate");
}
function ativaMenuPainelUsuario (idMenu) {
		$(idMenu).addClass("active");
}

function mostraResultadoOperacoes (sucesso, msg) {
	if(sucesso){
		$(".resultado_de_operacoes").css("display","block");
		$(".resultado_sucesso").css("display","block");
		$(".resultado_sucesso").text(msg);
	}
	else{
		$(".resultado_de_operacoes").css("display","block");
		$(".resultado_erro").css("display","block");
		$(".resultado_erro").text(msg);
	}
}

function valorEhVazio (valor) {
		if(valor == null || valor == undefined || valor == "" ){
			return true;
		}
		else{
			return false;
		}
}

function checaSeUsuarioTemNovasNotificacoes() {
	$.ajax({
				dataType : 'text',
		        url: 'backend/notificacao_checa_se_usuario_ja_viu.php',
		        success : function(result) {
		        	if(result == "true") {
		    			$(".topo_fixed .notificacao-icon").css("display","block");
		    			$(".painel_menu .notificacao-icon").css("color","red");
		    			$("#painel_menu_notificacoes a").css("color","red");
		    		}
		        }
		    });
}


function carregaComboCidade(combo_class){
		$.ajax({
		        type : 'POST',
		        dataType : 'json',
		        data: ({sql: "SELECT * FROM cidade where estado = '23'"}) ,
		        url: 'backend/busca_db_simples.php',
		        async: false,
		        success : function(json_result) {
		        	//alert(JSON.stringify(json_result));

		            $.each(json_result, function(index, json_result) {	
            			$(combo_class).append("<option>" + json_result.nome + "</option>");
	        		});

	        		$(combo_class).chosen({no_results_text: "Oops, nenhuma cidade encontrada!"}); 

		        },
		        error: function(XMLHttpRequest, textStatus, errorThrown){
			    	alert("error: " + textStatus);
			    } 
		    });
	}







