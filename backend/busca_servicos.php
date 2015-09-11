<?php
$filtroDeTexto = trim($_GET['filtroDeTexto']);
$filtroDoCombo = trim($_GET['filtroDoCombo']);
/* $filtroDeEstado = trim($_GET['filtroDeEstado']); */

$errorMessage = "";
$conn = include "db_connection.php";
$sql = " SELECT servico.*,usuario.* FROM servico JOIN usuario ON servico.id_usuario = usuario.id_usuario";
$orderBy = " ORDER BY destaque DESC ";



/* sample:
SELECT servico.*, usuario.*
FROM servico 
JOIN usuario ON servico.id_usuario = usuario.id_usuario
WHERE usuario.nome LIKE '%a%';
*/

$sql .= " WHERE usuario.nome LIKE '%".$filtroDeTexto."%' AND servico.categoria like '%".$filtroDoCombo."%' ";
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