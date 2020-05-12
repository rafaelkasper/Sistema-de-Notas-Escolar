<?php

//SALVA NO BD OS ADMINISTRADORES
include '../functions/valida_sessao_ads.php';
include "../functions/conecta_banco.php";

$nome_ads = ( isset($_POST['nome_ads']) ) ? $_POST['nome_ads'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;

$senha = password_hash($senha, PASSWORD_DEFAULT);

$cadastrar = $con->query("INSERT INTO ads (nome_ads, login, senha, email, telefone, niveis_acesso) VALUES ('$nome_ads', '$login', '$senha', '$email', '$telefone', '1')");
$ultimo_id = $con->query("SELECT MAX(id) FROM ads");
$ult_id = $ultimo_id->fetch_array();

$cadastro = $con->query("INSERT INTO acesso (ads_id, niveis_acesso_id, login, senha) VALUES ('$ult_id[0]', '1', '$login', '$senha')");
if ($cadastro) {
    $_SESSION['sucesso'] = "ADMINISTRADOR(A) INSERIDO(A) COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR ADMINISTRADOR(A)!";
}
header("Location: ads_cadastrar_ads.php");
