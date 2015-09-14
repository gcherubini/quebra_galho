<?php
$filtroTexto = trim($_GET['filtroTexto']);
$filtroComboEmprego = trim($_GET['filtroComboEmprego']);
$filtroComboEstado = trim($_GET['filtroComboEstado']); 

$errorMessage = "";
$conn = include "db_connection.php";
$sql = "SELECT servico.*,usuario.*,emprego.* FROM servico JOIN usuario ON servico.id_usuario = usuario.id_usuario JOIN emprego ON servico.id_emprego = emprego.id_emprego ";
$orderBy = " ORDER BY destaque DESC ";
$sql .= " WHERE usuario.nome LIKE '%".$filtroTexto."%' AND emprego.emprego like '%".$filtroComboEmprego."%' AND servico.estado like '%".$filtroComboEstado."%' ";
$sql .= $orderBy;

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