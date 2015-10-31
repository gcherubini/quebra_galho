<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$contratado = isset($_POST['contratado']) ? trim($_POST['contratado']) : '';
$contratante = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : '';
$numero_estrelas = isset($_POST['numero_estrelas']) ? trim($_POST['numero_estrelas']) : '';
$descricao_do_servico = isset($_POST['descricao_do_servico']) ? trim($_POST['descricao_do_servico']) : '';

$errorMessage = "";

$conn = include "db_connection.php";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

// get id_servico from negociacao
//TODO

// update negociacao to finalizada

$sql = "UPDATE negociacao  SET finalizada = true   WHERE contratante = '".$contratante."'  AND  contratado = '".$contratado."'  ;";
$result = $conn->query($sql);

if ($result === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}
else {
	// nova avaliacao
	// TODO

	$sql = "INSERT INTO avaliacao (id_servico, contratante, contratado)
			VALUES ('".$id_servico."', '".$contratante."','".$contratado."')";
	$result = $conn->query($sql);

	if ($result === FALSE) {
	    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
	}

}


$conn->close();


if($errorMessage == "") {
	echo json_encode($contratadoArray);
}
else{
	$errorArray = array('errorMessage'  => $errorMessage);
	echo json_encode($errorArray);
}


?>