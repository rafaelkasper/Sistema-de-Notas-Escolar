<?php
//SALVA AS ALTERAÇÕES DOS PROFESSORES NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$status = $_POST['status'];
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consultar = $con->query("SELECT login FROM professores WHERE login='$login'");
$linha = $consultar->num_rows;
$consulta = $con->query("UPDATE professores SET nome='$nome', email='$email', telefone='$telefone', login='$login', senha='$senha', status='$status' WHERE id ='$id'");
$update = $con->query("UPDATE acesso SET login='$login', senha ='$senha', status='$status' WHERE professores_id = $id");
if ($consulta) {
    $_SESSION['sucesso'] = "PROFESSOR(A) ALTERADO(A) COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR PROFESSOR(A)!";
}
header("Location: ads_alterar_professores.php");
