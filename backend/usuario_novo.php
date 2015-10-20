<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : "";
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : "";
$data_nascimento = isset($_POST['data_nascimento']) ? trim($_POST['data_nascimento']) : "";
$sexo = isset($_POST['sexo']) ? trim($_POST['sexo']) : "";
$imageData = isset($_POST['image-data']) ? trim($_POST['image-data']) : "";


$data_nascimento = strtotime($data_nascimento);
//http://php.net/manual/en/datetime.format.php

$errorMessage = "";
$conn = include "db_connection.php";
$sql = "INSERT INTO usuario (email, senha, nome, data_nascimento, sexo)
		VALUES ('".$email."', '".$senha."','".$nome."', '".date('y-m-d',$data_nascimento)."', '".$sexo."')";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 

if ($conn->query($sql) === FALSE) {
    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
}

if($errorMessage == "") {
	$idInserted = $conn->insert_id;
	$_SESSION["id_usuario"] = $idInserted;
	$_SESSION["nome"] = $nome;

	// salva foto 
	if($imageData != "") {
		if (!preg_match_all('/^data:image\/(.*);base64,(.*)$/m', $imageData, $match)){ 
			die ('Erro ao salvar sua imagem. Por favor contate nos contate!');
		}

		$today = date("d-m-Y_H-i-s");
		$imageName = $idInserted . "_" . $today . ".jpg";
		$imagePathSQL = "img/usuarios/" . $imageName;
		$imagePathDirectory = "../" . $imagePathSQL;

		$img_decoded = base64_decode($match[2][0]);
		if (file_put_contents($imagePathDirectory, $img_decoded) === FALSE) {
			die ('Erro ao salvar sua imagem. Por favor contate nos contate!');
		}
		else{
			// salva url da foto no banco após salvar no disco
			$sql = "UPDATE usuario SET img_url = '".$imagePathSQL."' WHERE id_usuario = '".$idInserted."'";

			if ($conn->query($sql) === FALSE) {
			    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
}

$conn->close();

echo $errorMessage;

?>