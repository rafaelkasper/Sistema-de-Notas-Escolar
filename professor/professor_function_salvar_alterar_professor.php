<?php
//SALVA AS ALTERAÇÕES CADASTRAIS NO BD
include '../functions/valida_sessao_professor.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$nome = ( isset($_POST['nome']) ) ? $_POST['nome'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consulta = $con->query("UPDATE professores SET nome='$nome', email='$email', telefone='$telefone', login='$login', senha='$senha' WHERE id ='$id'");
$update = $con->query("UPDATE acesso SET login='$login', senha ='$senha' WHERE professores_id = $id");
header("Location: professor_alterar_cadastro.php");
