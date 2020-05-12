<?php
//SALVA NO BD A EQUIPE DIRETIVA
include '../functions/valida_sessao_ads.php';
include "../functions/conecta_banco.php";
$nome_equipe = ( isset($_POST['nome_equipe']) ) ? $_POST['nome_equipe'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$cadastrar = $con->query("INSERT INTO equipe_diretiva (nome_equipe, login, senha, email, telefone, niveis_acesso) VALUES ('$nome_equipe', '$login', '$senha', '$email', '$telefone', '4')");
$ultimo_id = $con->query("SELECT MAX(id) FROM equipe_diretiva");
$ult_id = $ultimo_id->fetch_array();
$cadastro = $con->query("INSERT INTO acesso (equipe_id, niveis_acesso_id, login, senha) VALUES ('$ult_id[0]', '4', '$login', '$senha')");
if ($cadastro) {
    $_SESSION['sucesso'] = "EQUIPE DIRETIVA INSERIDO(A) COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR EQUIPE DIRETIVA!";
}
header("Location: ads_cadastrar_equipe_diretiva.php");
