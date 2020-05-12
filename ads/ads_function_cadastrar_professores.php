<?php
//SALVA NO BD OS PROFESSORES
include '../functions/valida_sessao_ads.php';
include "../functions/conecta_banco.php";
$nome_professor = ( isset($_POST['nome_professor']) ) ? $_POST['nome_professor'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consulta = $con->query("SELECT login FROM professores WHERE login='$login'");
$linha = $consulta->num_rows;
if ($linha == 0) {
    $cadastrar = $con->query("INSERT INTO professores (nome, login, senha, email, telefone, niveis_acesso, status) VALUES ('$nome_professor', '$login', '$senha', '$email', '$telefone', '2', '1')");
    $ultimo_id = $con->query("SELECT MAX(id) FROM professores");
    $ult_id = $ultimo_id->fetch_array();
    $cadastro = $con->query("INSERT INTO acesso (professores_id, niveis_acesso_id, login, senha, status) VALUES ('$ult_id[0]', '2', '$login', '$senha', '1')");
    if ($cadastro) {
        $_SESSION['sucesso'] = "PROFESSOR(A) INSERIDO(A) COM SUCESSO!";
    } else {
        $_SESSION['erro'] = "ERRO AO INSERIR´PROFESSOR(A)!";
    }
    header("Location: ads_cadastrar_professores.php");
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR´PROFESSOR(A)!";
}
header("Location: ads_cadastrar_professores.php");
