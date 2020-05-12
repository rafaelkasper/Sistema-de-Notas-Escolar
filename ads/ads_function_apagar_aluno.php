<?php

//APAGA ALUNOS
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_GET['id'];


$resultado_usuario = $con->query("DELETE FROM alunos WHERE id=$id");
header("Location: ads_alterar_alunos.php");
