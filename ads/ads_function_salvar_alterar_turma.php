<?php
//SALVA AS ALTERAÇÕES DAS TURMAS NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$status = $_POST['status'];
$nome = ( isset($_POST['nome_turma']) ) ? $_POST['nome_turma'] : null;
$ano = ( isset($_POST['ano_letivo_id']) ) ? $_POST['ano_letivo_id'] : null;
$consulta = $con->query("UPDATE turmas SET nome_turma='$nome', ano_letivo_id='$ano', status='$status' WHERE id ='$id'");
if ($consulta) {
    $_SESSION['sucesso'] = "TURMA ALTERADA COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR TURMA!";
}
header("Location: ads_alterar_turma.php");
