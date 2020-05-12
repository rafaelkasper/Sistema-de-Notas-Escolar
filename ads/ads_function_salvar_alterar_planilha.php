<?php
//SALVA AS ALTERAÇÕES DAS PLANILHAS DE NOTAS INDIVIDUAIS NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$turma = ( isset($_POST['turmas_id']) ) ? $_POST['turmas_id'] : null;
$disciplina = ( isset($_POST['disciplina_id']) ) ? $_POST['disciplina_id'] : null;
$trimestre = ( isset($_POST['trimestre_id']) ) ? $_POST['trimestre_id'] : null;
$professor = ( isset($_POST['professores_id']) ) ? $_POST['professores_id'] : null;
$ano = ( isset($_POST['ano_letivo_id']) ) ? $_POST['ano_letivo_id'] : null;
$consulta = $con->query("UPDATE notas SET turmas_id='$turma', disciplina_id='$disciplina', professores_id='$professor', ano_letivo_id='$ano', trimestre_id='$trimestre' WHERE id ='$id'");
$upd = $con->query("UPDATE medias SET turma_id='$turma' WHERE aluno_id ='$id'");
if ($consulta) {
    $_SESSION['sucesso'] = "PLANILHA ALTERADA COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR PLANILHA!";
}
header("Location: ads_alterar_planilha.php");
