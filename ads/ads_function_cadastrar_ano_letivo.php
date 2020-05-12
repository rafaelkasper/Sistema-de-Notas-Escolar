<?php
//SALVA NO BD O ANO LETIVO
include '../functions/valida_sessao_ads.php';
include "../functions/conecta_banco.php";
$ano_letivo = $_POST['ano_letivo'];
$cadastrar = $con->query("INSERT INTO ano_letivo (ano) VALUES ('$ano_letivo')");
if ($cadastrar) {
    $_SESSION['sucesso'] = "ANO LETIVO INSERIDO COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR ANO LETIVO!";
}
header("Location: ads_cadastrar_ano_letivo.php");
