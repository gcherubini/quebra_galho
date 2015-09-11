<?php
$filtroDeTexto = trim($_GET['filtroDeTexto']);; 
$filtroDoCombo = trim($_GET['filtroDoCombo']);; 
$filtroDeEstado = trim($_GET['filtroDeEstado']);; 

$conn = include "db_connection.php";
$sql = " SELECT * FROM servico ";
$orderBy = " ORDER BY destaque DESC ";
$errorMessage = "";

if($filtroDeTexto != ""){
	$sql .= " WHERE nome like '%".$filtroDeTexto."%' ";
}
if($filtroDoCombo != ""){
	if($filtroDeTexto != "") { $sql .= " AND "; }
	else { $sql .= " WHERE "; }
	$sql .= " categoria like '%".$filtroDoCombo."%' ";
}
$sql .= $orderBy;

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

$result = $conn->query($sql);

$rows = array();
while($r = $result->fetch_assoc()) {
   $rows[] = $r;
}
echo json_encode($rows);


$result->close();
$conn->close();



?>