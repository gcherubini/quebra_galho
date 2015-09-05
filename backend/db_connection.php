<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "servicosonline";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->connect_error) {
   	$conn->query("SET NAMES 'utf8'");
	$conn->query('SET character_set_connection=utf8');
	$conn->query('SET character_set_client=utf8');
	$conn->query('SET character_set_results=utf8');
}

return $conn;
?>