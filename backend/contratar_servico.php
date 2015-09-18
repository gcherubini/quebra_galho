<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_servico = isset($_POST['id_servico']) ? trim($_POST['id_servico']) : '';
$contratante = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : '';

$errorMessage = "";

$conn = include "db_connection.php";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

// get contratado
$sql = "SELECT id_usuario FROM servico 
		WHERE id_servico = '" . $id_servico. "'";
$contratado = "";
$result = $conn->query($sql);
while($r = $result->fetch_assoc()) {
    $contratado = $r["id_usuario"];
}
$result->close();

// check if negociacao already exists
$sql = "SELECT * FROM negociacao 
	    WHERE contratante = '" . $contratante. "' 
	    AND   contratado = '" . $contratado. "'";
$negociacaoAlreadyExist = false;
$result = $conn->query($sql);
while($r = $result->fetch_assoc()) {
    $negociacaoAlreadyExist = true;
}
$result->close();

if($negociacaoAlreadyExist == true){
	$errorMessage .= "Você já está negociando com este Quebra-Galho";
}
else if($contratante == $contratado) {
	 $errorMessage .= "Usuários contratante e contratado não podem ser os mesmos";
}
else {
	$sql = "INSERT INTO negociacao (id_servico, contratante, contratado)
			VALUES ('".$id_servico."', '".$contratante."','".$contratado."')";
	$result = $conn->query($sql);

	if ($result === FALSE) {
	    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();

echo $errorMessage;

?>