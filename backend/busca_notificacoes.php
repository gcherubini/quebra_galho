<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_usuario = isset($_SESSION['id_usuario']) ? trim($_SESSION['id_usuario']) : '';

$errorMessage = "";
$conn = include "db_connection.php";

$sql = "SELECT * FROM notificacao WHERE id_usuario = '".$id_usuario."' ORDER BY data_criacao";

//$orderBy = " ORDER BY date_criacao DESC " need to create this attr in mysql;
//$sql .= $orderBy;

// DEBUG MODE ->  echo $sql;

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

$result = $conn->query($sql);

$retArray = array();
while($r = $result->fetch_assoc()) {
    $retArray[] = $r;
}

// Return json with servico + usuario attrs
echo json_encode($retArray);


$result->close();
$conn->close();

?>