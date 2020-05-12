<?php
//SALVA AS ALTERAÇÕES DAS DISCIPLINAS NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$id_antigo = ( isset($_POST['id_antigo']) ) ? $_POST['id_antigo'] : null;
$nome = ( isset($_POST['nome_disciplina']) ) ? $_POST['nome_disciplina'] : null;
$professor = ( isset($_POST['professor_id']) ) ? $_POST['professor_id'] : null;
$ano = ( isset($_POST['ano_letivo_id']) ) ? $_POST['ano_letivo_id'] : null;
$consulta = $con->query("UPDATE disciplinas SET nome_disciplina='$nome', professor_id='$professor', ano_letivo_id='$ano' WHERE id ='$id'");
$consult = $con->query("UPDATE notas SET professores_id=$professor WHERE professores_id =$id_antigo");
if ($consulta) {
    $_SESSION['sucesso'] = "DISCIPLINA ALTERADA COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR DISCIPLINA!";
}
header("Location: ads_alterar_disciplina.php");
