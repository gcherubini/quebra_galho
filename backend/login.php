<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$authorized = "false";
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$conn = include "db_connection.php";
$sql = "SELECT * FROM usuario WHERE email = '" .$email."'";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

$result = $conn->query($sql);

$retArray = array();
while($r = $result->fetch_assoc()) {
    $retArray[] = $r;
    $_SESSION["id_usuario"] = $r["id_usuario"];
    $_SESSION["nome"] = $r["nome"];
    $authorized = "true";
}

$result->close();
$conn->close();

echo $authorized;

?>