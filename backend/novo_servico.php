<?php
$conn = include "db_connection.php";
$sql = "INSERT INTO servico (titulo, descricao)
		VALUES ('Teste', 'Super Teste')";
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