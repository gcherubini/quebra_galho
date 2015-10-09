<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_usuario = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : '';

$errorMessage = "";
$conn = include "db_connection.php";

$sql = " UPDATE usuario SET tem_nova_notificacao = false where id_usuario = '".$id_usuario."'  ";


// DEBUG MODE ->  echo $sql;

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

$result = $conn->query($sql);

if ($result === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo $errorMessage;


?>