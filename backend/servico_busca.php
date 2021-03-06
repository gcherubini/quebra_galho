<?php
$filtroTexto = isset($_POST['filtroTexto']) ? trim($_POST['filtroTexto']) : '';
$filtroIdUsuario = isset($_POST['filtroIdUsuario']) ? trim($_POST['filtroIdUsuario']) : '';
$filtroIdServico = isset($_POST['filtroIdServico']) ? trim($_POST['filtroIdServico']) : '';
$limit = isset($_POST['limit']) ? trim($_POST['limit']) : '10';
$offset = isset($_POST['offset']) ? trim($_POST['offset']) : '0';

$filtrosArray = explode(",", $filtroTexto);
$filtrarPor = ["emprego.emprego","servico.descricao","servico.cidade"];

$errorMessage = "";
$conn = include "db_connection.php";

$sql = "SELECT servico.*,usuario.*,emprego.*, usuario.img_url as usuario_img_url, TIMESTAMPDIFF(YEAR, usuario.data_nascimento, CURDATE()) as idade  FROM servico 
		JOIN usuario ON servico.id_usuario = usuario.id_usuario 
		JOIN emprego ON servico.id_emprego = emprego.id_emprego ";


if (count($filtrosArray) === 1) {
	// se tem apenas um filtro
    $sql .= " WHERE ( ";
    foreach($filtrarPor as $fCol){
		$sql .= "  ".$fCol." LIKE '%".trim($filtroTexto)."%' OR ";
	}

	//DELETE LAST OR
    if(strrpos($sql, "OR") !== false) $sql = substr_replace($sql, "", strrpos($sql, "OR"), strlen("OR"));
	$sql .= " ) ";

}
else{
	// se tem mais de um filtro separado por +
	$sql .= " WHERE ( ";
	foreach ($filtrosArray as $fValue) {
		foreach($filtrarPor as $fCol){
			$sql .= "  ".$fCol." LIKE '%".trim($fValue)."%' OR ";
		}
	}
	//DELETE LAST OR
    if(strrpos($sql, "OR") !== false) $sql = substr_replace($sql, "", strrpos($sql, "OR"), strlen("OR"));
	$sql .= " ) ";
}


if($filtroIdUsuario != "") {
	$sql .= " AND usuario.id_usuario = '".$filtroIdUsuario."'";	
}
if($filtroIdServico != "") {
	$sql .= " AND servico.id_servico = '".$filtroIdServico."'";	
}






$sql .= " ORDER BY servico.destaque DESC , servico.data_criacao DESC ";
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