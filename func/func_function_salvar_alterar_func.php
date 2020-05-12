<?php

include '../functions/valida_sessao_func.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;

$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consulta = $con->query("UPDATE funcionarios SET nome='$nome',login='$login', senha='$senha' WHERE id ='$id'");
$update = $con->query("UPDATE acesso SET login = '$login', senha = '$senha' WHERE func_id = $id");

header("Location: func_alterar_cadastro.php");