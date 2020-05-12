<?php

//SALVA NO BD A ALTERAÇÃO DOS DADOS DA EQUIPE DIRETIVA
include '../functions/valida_sessao_equipe.php';
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

header("Location: equipe_alterar_cadastro.php");
