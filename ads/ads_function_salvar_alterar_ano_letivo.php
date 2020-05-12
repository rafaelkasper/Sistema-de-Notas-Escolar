<?php
//SALVA AS ALTERAÇÕES DO ANO LETIVO NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$ano = ( isset($_POST['ano']) ) ? $_POST['ano'] : null;
$consulta = $con->query("UPDATE ano_letivo SET ano='$ano' WHERE id ='$id'");
if ($consulta) {
    $_SESSION['sucesso'] = "ANO LETIVO ALTERADOCOM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR ANO LETIVO!";
}
header("Location: ads_alterar_ano_letivo.php");
