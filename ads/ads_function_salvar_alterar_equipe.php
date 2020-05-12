<?php
//SALVA AS ALTERAÇÕES DA EQUIPE DIRETIVA NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$nome = ( isset($_POST['nome_equipe']) ) ? $_POST['nome_equipe'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consulta = $con->query("UPDATE equipe_diretiva SET nome_equipe='$nome', email='$email', telefone='$telefone', login='$login', senha='$senha' WHERE id ='$id'");
$update = $con->query("UPDATE acesso SET login = '$login', senha = '$senha' WHERE equipe_id = $id");
if ($consulta) {
    $_SESSION['sucesso'] = "EQUIPE DIRETIVA ALTERADA COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR EQUIPE DIRETIVA!";
}
header("Location: ads_alterar_equipe.php");
