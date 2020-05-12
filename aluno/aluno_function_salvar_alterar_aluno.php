<?php

//SALVA NO BD AS ALTERAÇÕES DOS ALUNOS
include '../functions/valida_sessao_aluno.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$nome = ( isset($_POST['nome_aluno']) ) ? $_POST['nome_aluno'] : null;

$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consulta = $con->query("UPDATE alunos SET nome_aluno='$nome',login='$login', senha='$senha' WHERE id ='$id'");
$update = $con->query("UPDATE acesso SET login = '$login', senha = '$senha' WHERE alunos_id = $id");

header("Location: aluno_alterar_cadastro.php");
