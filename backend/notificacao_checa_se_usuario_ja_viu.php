<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_usuario = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : '';

$errorMessage = "";
$conn = include "db_connection.php";

$sql = " SELECT * FROM usuario where id_usuario = '".$id_usuario."' and tem_nova_notificacao = true ";


// DEBUG MODE ->  echo $sql;

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

$result = $conn->query($sql);

$tem_nova_notificacao = "false";
while($r = $result->fetch_assoc()) {
    $tem_nova_notificacao = "true";
}

$result->close();
$conn->close();

echo $tem_nova_notificacao;



?>