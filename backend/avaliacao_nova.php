<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_servico_e_contratado = isset($_POST['id_servico_e_contratado']) ? trim($_POST['id_servico_e_contratado']) : '';
$contratante = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : '';
$numero_estrelas = isset($_POST['numero_estrelas']) ? trim($_POST['numero_estrelas']) : '';
$descricao_do_servico = isset($_POST['descricao_do_servico']) ? trim($_POST['descricao_do_servico']) : '';


$array_servico_e_contratado = explode("-", $id_servico_e_contratado);
$id_servico = $array_servico_e_contratado[0]; 
$contratado = $array_servico_e_contratado[1]; 


$errorMessage = "";

$conn = include "db_connection.php";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 


// update negociacao to finalizada

$sql = "UPDATE negociacao  SET negociacao_finalizada = true   WHERE contratante = '".$contratante."'  AND  contratado = '".$contratado."'  ;";
$result = $conn->query($sql);

if ($result === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}
else {
	// nova avaliacao no banco
	$sql = "INSERT INTO avaliacao (id_servico, contratante, contratado, numero_estrelas, descricao_do_servico)
			VALUES ('".$id_servico."', '".$contratante."','".$contratado."','".$numero_estrelas."','".$descricao_do_servico."')";
	$result = $conn->query($sql);

	if ($result === FALSE) {
	    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
	}
}


$conn->close();


echo $errorMessage;


?>