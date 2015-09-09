<?php
$nome = trim($_POST['nome']);;
$sobrenome = trim($_POST['sobrenome']);;
$estado = trim($_POST['estado']);;
$cidade = trim($_POST['cidade']);;
$idade = trim($_POST['idade']);;
$sexo = trim($_POST['sexo']);;


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