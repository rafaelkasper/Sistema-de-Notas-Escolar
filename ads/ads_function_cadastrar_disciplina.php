<?php

//SALVA NO BD AS DISCIPLINAS
include '../functions/valida_sessao_ads.php';
include "../functions/conecta_banco.php";
$nome_disciplina = $_POST['nome_disciplina'];
$professor = $_POST['professor'];
$ano_letivo = $_POST['ano_letivo'];
$cadastrar = $con->query("INSERT INTO disciplinas (nome_disciplina, professor_id, ano_letivo_id) VALUES ('$nome_disciplina', '$professor', '$ano_letivo')");
if ($cadastrar) {
    $_SESSION['sucesso'] = "DISCIPLINA INSERIDA COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR DISCIPLINA!";
}
header("Location: ads_cadastrar_disciplinas.php");
