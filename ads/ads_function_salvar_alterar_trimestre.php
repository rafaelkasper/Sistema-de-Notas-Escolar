<?php
//SALVA AS ALTERAÇÕES DOS TRIMESTRES NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$status = $_POST['status'];
$trimestre = ( isset($_POST['trimestre']) ) ? $_POST['trimestre'] : null;
$consulta = $con->query("UPDATE trimestre SET nome_trimestre='$trimestre', status = $status WHERE id ='$id'");
if ($consulta) {
    $_SESSION['sucesso'] = "TRIMESTRE ALTERADO COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR TRIMESTRE!";
}
header("Location: ads_alterar_trimestre.php");
