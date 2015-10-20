<?php 

$sql = isset($_POST['sql']) ? trim($_POST['sql']) : "";

$errorMessage = "";
$conn = include "db_connection.php";

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