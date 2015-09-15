<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$nome = trim($_POST['nome']);
$idade = trim($_POST['idade']);
$sexo = trim($_POST['sexo']);

$errorMessage = "";
$conn = include "db_connection.php";
$sql = "INSERT INTO usuario (email, senha, nome, idade, sexo)
		VALUES ('".$email."', '".$senha."','".$nome."', '".$idade."', '".$sexo."')";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

if ($conn->query($sql) === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}

if($errorMessage == "") {
	$idInserted = mysql_insert_id();
	$_SESSION["id_usuario"] = $idInserted;
	$_SESSION["nome"] = $nome;
}

$conn->close();

echo $errorMessage;

?>