<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_usuario = $_SESSION['id_usuario'] ;
$emprego = isset($_POST['emprego']) ? trim($_POST['emprego']) : '';
$slogan = isset($_POST['slogan']) ? trim($_POST['slogan']) : '';
$descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : '';
$estado = isset($_POST['estado']) ? trim($_POST['estado']) : '';
$cidade = isset($_POST['cidade']) ? trim($_POST['cidade']) : '';
$errorMessage = "";

$conn = include "db_connection.php";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

// get id_emprego
/*$sql = "SELECT id_emprego FROM emprego WHERE emprego = " . $emprego;
$id_emprego = "";
$result = $conn->query($sql);
while($r = $result->fetch_assoc()) {
    $id_emprego = $r["id_emprego"];
}
$result->close();
*/
// insert new servico
$id_emprego = 1;
$sql = "INSERT INTO servico (slogan, descricao, id_usuario, id_emprego)
		VALUES ('".$slogan."', '".$descricao."','".$id_usuario."', '".$id_emprego."')";
$result = $conn->query($sql);

if ($result === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}




$conn->close();

echo $errorMessage;

?>