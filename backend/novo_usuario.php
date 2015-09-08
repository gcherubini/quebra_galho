<?php
$nome = trim($_GET['nome']);;
$sobrenome = trim($_GET['sobrenome']);;
$estado = trim($_GET['estado']);;
$cidade = trim($_GET['cidade']);;
$idade = trim($_GET['idade']);;
$sexo = trim($_GET['sexo']);;


$conn = include "db_connection.php";
$sql = "INSERT INTO servico (nome, sobrenome, estado, cidade, idade, sexo)
		VALUES ('".$nome."', '".$sobrenome."', '".$estado."', '".$cidade."', '".$idade."', '".$sexo."')";
$errorMessage = "";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

if ($conn->query($sql) === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo $errorMessage;

?>