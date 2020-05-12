<?php
//SALVA AS ALTERAÇÕES DA PLANILHA DE NOTAS DAS TURMAS NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id_antigo = $_POST['id'];
$turma = $_SESSION['turma'];
$disciplina_antiga = $_SESSION['disciplina_antiga'];
$disciplina = ( isset($_POST['disciplina_id']) ) ? $_POST['disciplina_id'] : null;
$professor = ( isset($_POST['professores_id']) ) ? $_POST['professores_id'] : null;
$ano = ( isset($_POST['ano_letivo_id']) ) ? $_POST['ano_letivo_id'] : null;
$consulta = $con->query("UPDATE notas SET professores_id = $professor, disciplina_id = $disciplina WHERE professores_id = $id_antigo AND turmas_id = $turma AND disciplina_id=$disciplina_antiga");
if ($consulta) {
    $_SESSION['sucesso'] = "PLANILHA ALTERADA COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR PLANILHA!";
}
header("Location: ads_alterar_planilha_turma.php");
