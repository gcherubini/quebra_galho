<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
$usuario_logado = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : '';
$tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';

if($tipo != ""){

	$errorMessage = "";
	$conn = include "db_connection.php";

	$sql = "SELECT negociacao.*, servico.*, usuario.*, emprego.* FROM negociacao 
			JOIN servico ON negociacao.id_servico = servico.id_servico
			JOIN usuario ON negociacao.contratado = usuario.id_usuario
			JOIN emprego ON servico.id_emprego = emprego.id_emprego ";


	if($tipo == "como_contratante"){
		$sql .= " WHERE negociacao.contratante = '".$usuario_logado."'";
	}
	else if($tipo == "como_prestador_de_servicos"){
		$sql .= " WHERE negociacao.contratado = '".$usuario_logado."'";
	}

	$sql .= " ORDER BY negociacao.negociacao_finalizada ASC , negociacao.data_criacao DESC ";

	
	//$orderBy = " ORDER BY date_criacao DESC " need to create this attr in mysql;
	//$sql .= $orderBy;

	// DEBUG MODE ->  echo $sql;

	if ($conn->connect_error) {
	    $errorMessage = "Connection failed: " . $conn->connect_error;
	} 

	$result = $conn->query($sql);

	$retArray = array();
	while($r = $result->fetch_assoc()) {
	    $retArray[] = $r;
	}

	// Return json with servico + usuario attrs
	echo json_encode($retArray);

	$result->close();
	$conn->close();

}

?>