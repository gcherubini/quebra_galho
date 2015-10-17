<?php
$filtroTexto = isset($_POST['filtroTexto']) ? trim($_POST['filtroTexto']) : '';
$filtroComboEmprego = isset($_POST['filtroComboEmprego']) ? trim($_POST['filtroComboEmprego']) : '';
$filtroComboEstado = isset($_POST['filtroComboEstado']) ? trim($_POST['filtroComboEstado']) : '';
$filtroIdUsuario = isset($_POST['filtroIdUsuario']) ? trim($_POST['filtroIdUsuario']) : '';
$filtroIdServico = isset($_POST['filtroIdServico']) ? trim($_POST['filtroIdServico']) : '';
$limit = isset($_POST['limit']) ? trim($_POST['limit']) : '10';
$offset = isset($_POST['offset']) ? trim($_POST['offset']) : '0';

$errorMessage = "";
$conn = include "db_connection.php";

$sql = "SELECT servico.*,usuario.*,emprego.*, usuario.img_url as usuario_img_url FROM servico 
		JOIN usuario ON servico.id_usuario = usuario.id_usuario 
		JOIN emprego ON servico.id_emprego = emprego.id_emprego ";

$sql .= " WHERE usuario.nome LIKE '%".$filtroTexto."%' AND 
		  emprego.emprego like '%".$filtroComboEmprego."%'";

if($filtroComboEstado != "") {
	$sql .= " AND servico.estado = '".$filtroComboEstado."' ";	
}
if($filtroIdUsuario != "") {
	$sql .= " AND usuario.id_usuario = '".$filtroIdUsuario."'";	
}
if($filtroIdServico != "") {
	$sql .= " AND servico.id_servico = '".$filtroIdServico."'";	
}

$sql .= " ORDER BY destaque DESC ";
$sql .= " LIMIT " .$limit. " OFFSET " .$offset. " ";

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