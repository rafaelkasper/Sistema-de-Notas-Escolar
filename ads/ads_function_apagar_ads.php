<?php

//APAGA ADMINISTRADORES
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_GET['id'];


$resultado_usuario = $con->query("DELETE FROM ads WHERE id=$id");
header("Location: ads_alterar_ads.php");
