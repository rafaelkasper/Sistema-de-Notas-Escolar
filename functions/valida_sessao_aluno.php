<?php
//VERIFICA SE O USUÁRIO POSSUI ACESSO À PÁGINA
include "conecta_banco.php";
session_start();
if (IsSet($_SESSION["login"]))
    $login = $_SESSION["login"];
if (IsSet($_SESSION["senha"]))
    $senha = $_SESSION["senha"];

if (IsSet($_SESSION["alunos_id"]))
    $alunos_id = $_SESSION["alunos_id"];

if (IsSet($_SESSION["niveis_acesso_id"]))
    $niveis_acesso_id = $_SESSION["niveis_acesso_id"];


if ($niveis_acesso_id == 3) {
  
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['alunos_id'] = $alunos_id;
    $_SESSION['niveis_acesso_id'] = $niveis_acesso_id;
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['alunos_id']);
    unset($_SESSION['niveis_acesso_id']);
    header("Location: ../index.php");
}

$con->close();
