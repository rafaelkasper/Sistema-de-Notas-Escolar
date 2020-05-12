<?php

//CONFIGURA A CONEXÃO COM O BD
$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "180217";
$banco = "ruibarbosa";
$con = new mysqli($servidor, $usuario_bd, $senha_bd, $banco);
ini_set('display_errors', true);
error_reporting(E_ALL);
mysqli_set_charset($con, "utf8");
?>