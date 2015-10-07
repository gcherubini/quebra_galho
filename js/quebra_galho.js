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











