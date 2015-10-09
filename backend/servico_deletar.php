<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }

$id_servico = isset($_POST['id_servico']) ? trim($_POST['id_servico']) : '';

$errorMessage = "";
$conn = include "db_connection.php";

if ($conn->connect_error) {
    $errorMessage = "Connection failed: " . $conn->connect_error;
} 


// verificar se alguma negociacao existe
$sql = "SELECT negociacao.*, servico.*, usuario.*, emprego.* FROM negociacao 
		JOIN servico ON negociacao.id_servico = servico.id_servico
		JOIN usuario ON negociacao.contratante = usuario.id_usuario
		JOIN emprego ON servico.id_emprego = emprego.id_emprego  ";
$sql .= " WHERE negociacao.id_servico = '".$id_servico."'";

$result = $conn->query($sql);
while($r = $result->fetch_assoc()) {
    //existe negociacao
    //criar notificacao para alertar contratante da deleção de servico
    $notificacaoMsg = "Uma de suas negociações foi apagada, pois o(a) ".$r["nome"]." não está mais prestando o serviço de " .$r["emprego"]. "\n";
    $notificacaoMsg .= "Se ainda quiser o contato do mesmo(a), segue abaixo: \n";
    $notificacaoMsg .= "E-mail: ".$r["email_contato"]." Tel: ".$r["tel_contato"]. " Cel: " .$r["cel_contato"];
	$sql = "INSERT INTO notificacao (mensagem, data_criacao, id_usuario)
			VALUES ('".$notificacaoMsg."', now() ,'".$r["contratante"]."')";
	$result2 = $conn->query($sql);

	if ($result2 === FALSE) {
	    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
	}

	//setar tem_nova_notificacao para true
	$sql = "UPDATE usuario 
			SET tem_nova_notificacao = true 
			WHERE id_usuario = '".$r["contratante"]."'";
	$result3 = $conn->query($sql);

	if ($result3 === FALSE) {
	    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
	}
}

if($errorMessage == ""){
	// se não houver nenhum erro, deletar servico e negociacoes em cascata
	$sql = "DELETE FROM servico WHERE id_servico = " . $id_servico ;
	if ($conn->query($sql) === FALSE) {
	    $errorMessage .= "SQL error: " . $sql . "<br>" . $conn->error;
	}
}


$conn->close();
echo $errorMessage;

?>