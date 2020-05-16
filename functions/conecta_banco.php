<?php

//CONFIGURA A CONEXÃO COM O BD
$servidor = "";
$usuario_bd = "";
$senha_bd = "";
$banco = "escolar";
$con = new mysqli($servidor, $usuario_bd, $senha_bd, $banco);
ini_set('display_errors', true);
error_reporting(E_ALL);
mysqli_set_charset($con, "utf8");
?>
