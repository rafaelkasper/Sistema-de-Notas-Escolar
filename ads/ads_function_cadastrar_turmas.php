<?php
//SALVA NO BD AS TURMAS
include '../functions/valida_sessao_ads.php';
include "../functions/conecta_banco.php";
$nome_turma = $_POST['nome_turma'];
$ano_letivo = $_POST['ano_letivo'];
$cadastrar = $con->query("INSERT INTO turmas (nome_turma, ano_letivo_id, status) VALUES ('$nome_turma', '$ano_letivo', '1')");
if ($cadastrar) {
    $_SESSION['sucesso'] = "TURMA INSERIDA COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR TURMA!";
}

//var_dump($ano_letivo);
header("Location: ads_cadastrar_turmas.php");
