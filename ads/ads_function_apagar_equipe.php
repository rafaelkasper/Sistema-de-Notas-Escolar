<?php

//APAGA EQUIPE DIRETIVA
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_GET['id'];


$resultado_usuario = $con->query("DELETE FROM equipe_diretiva WHERE id=$id");
header("Location: ads_alterar_equipe.php");
