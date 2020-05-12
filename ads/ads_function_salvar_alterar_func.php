<?php
//SALVA AS ALTERAÇÕES DOS FUNCIONÁRIOS NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$status = ( isset($_POST['status']) ) ? $_POST['status'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consulta = $con->query("UPDATE funcionarios SET nome='$nome', email='$email', telefone='$telefone', login='$login', senha='$senha', status='$status' WHERE id ='$id'");
$update = $con->query("UPDATE acesso SET login = '$login', senha = '$senha', status='$status' WHERE func_id = $id");
if ($consulta) {
    $_SESSION['sucesso'] = "FUNCIONÁRIO(A) ALTERADO(A) COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR FUNCIONÁRIO(A)!";
}
header("Location: ads_alterar_func.php");
