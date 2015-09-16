<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_servico = isset($_POST['id_servico']) ? trim($_POST['id_servico']) : '';

$errorMessage = "";
$conn = include "db_connection.php";
$sql = "DELETE FROM servico WHERE id_servico = " . $id_servico ;

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

if ($conn->query($sql) === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo $errorMessage;

?>