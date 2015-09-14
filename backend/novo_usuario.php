<?php
session_start();

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$nome = trim($_POST['nome']);
$sobrenome = trim($_POST['sobrenome']);
$estado = trim($_POST['estado']);
$cidade = trim($_POST['cidade']);
$idade = trim($_POST['idade']);
$sexo = trim($_POST['sexo']);



$conn = include "db_connection.php";
$sql = "INSERT INTO servico (email, senha, nome, sobrenome, estado, cidade, idade, sexo)
		VALUES ('".$email."', '".$senha."','".$nome."', '".$sobrenome."', '".$estado."', '".$cidade."', '".$idade."', '".$sexo."')";
$errorMessage = "";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

if ($conn->query($sql) === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}


if($errorMessage == "") {
	$idInserted = mysql_insert_id();
	$_SESSION['id_usuario']
}
else {
	echo $errorMessage;
}


$conn->close();



?>