<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$prestador_nome = isset($_SESSION['nome']) ? trim($_SESSION['nome']) : '';
$ids = isset($_POST['ids']) ? trim($_POST['ids']) : '';

$array_ids = explode("-", $ids);
$id_servico = $array_ids[0]; 
$contratante = $array_ids[1]; 

$errorMessage = "";
$conn = include "db_connection.php";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 



// buscar servico e emprego
$sql = "  SELECT  servico.*, emprego.* FROM servico 
		  JOIN emprego ON servico.id_emprego = emprego.id_emprego ";
$sql .= " WHERE servico.id_servico = '".$id_servico."'";
$result = $conn->query($sql);
while($r = $result->fetch_assoc()) {
	// se servico existe -> nova notificacao
	$notificacaoMsg = "Parece que o serviço de " .$r["emprego"]. " prestado por " .$prestador_nome. " já foi realizado. 
					   " .$prestador_nome. " está solicitando que você avalie seu trabalho. <br>
					   Você pode avaliar este serviço <a href=painel_usuario_negociacoes.php>entrando aqui</a> 
					   e clicando no botão de Finalizar Negociação";

	$sql = "INSERT INTO notificacao (mensagem, data_criacao, id_usuario)
			VALUES ('".$notificacaoMsg."', now() ,'". $contratante ."')";
	$result2 = $conn->query($sql);

	if ($result2 === FALSE) {
	    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
	}
	else{
		//setar tem_nova_notificacao para true
		$sql = "UPDATE usuario 
				SET tem_nova_notificacao = true 
				WHERE id_usuario = '". $contratante ."'";
		$result3 = $conn->query($sql);

		if ($result3 === FALSE) {
		    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
		}
	}
}

$conn->close();
echo $errorMessage;

?>