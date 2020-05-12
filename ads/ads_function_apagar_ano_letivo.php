<?php

//APAGA ANO LETIVO
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_GET['id'];


$resultado_usuario = $con->query("DELETE FROM ano_letivo WHERE id=$id");
header("Location: ads_alterar_ano_letivo.php");
