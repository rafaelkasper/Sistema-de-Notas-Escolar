<?php
//SALVA NO BD OS FUNCIONÁRIOS
include '../functions/valida_sessao_ads.php';
include "../functions/conecta_banco.php";
$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$cadastrar = $con->query("INSERT INTO funcionarios (nome, login, senha, niveis_acesso, status) VALUES ('$nome', '$login', '$senha', '5', '1')");
$ultimo_id = $con->query("SELECT MAX(id) FROM funcionarios");
$ult_id = $ultimo_id->fetch_array();
$cadastro = $con->query("INSERT INTO acesso (func_id, niveis_acesso_id, login, senha, status) VALUES ('$ult_id[0]', '5', '$login', '$senha', '1')");
if ($cadastro) {
    $_SESSION['sucesso'] = "FUNCIONÁRIO(A) INSERIDO(A) COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR FUNCIONÁRIO(A)!";
}
header("Location: ads_cadastrar_func.php");
