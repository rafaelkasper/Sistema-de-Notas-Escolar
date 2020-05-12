
<?php

//SALVA NO BD OS ALUNOS
include "../functions/valida_sessao_ads.php";
include "../functions/conecta_banco.php";

$nome_aluno = ( isset($_POST['nome_aluno']) ) ? $_POST['nome_aluno'] : null;
$turma = ( isset($_POST['turma']) ) ? $_POST['turma'] : null;
$email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
$telefone = ( isset($_POST['telefone']) ) ? $_POST['telefone'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$ano_letivo = ( isset($_POST['ano_letivo']) ) ? $_POST['ano_letivo'] : null;
$chamada = ( isset($_POST['chamada']) ) ? $_POST['chamada'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consulta = $con->query("SELECT login FROM alunos WHERE login='$login'");
$linha = $consulta->num_rows;
if ($linha == 0) {
    $cadastrar = $con->query("INSERT INTO alunos (nome_aluno, login, senha, niveis_acesso, turma, ano_letivo_id, status, chamada) VALUES ('$nome_aluno', '$login', '$senha', '3', '$turma', '$ano_letivo', '1', '$chamada')");
    $ultimo_id = $con->query("SELECT MAX(id) FROM alunos");
    $ult_id = $ultimo_id->fetch_array();
    $cadastro = $con->query("INSERT INTO acesso (alunos_id, niveis_acesso_id, login, senha, status) VALUES ('$ult_id[0]', '3', '$login', '$senha', '1')");
    if ($cadastro) {
        $_SESSION['sucesso'] = "ALUNO(A) INSERIDO(A) COM SUCESSO!";
    } else {
        $_SESSION['erro'] = "ERRO AO INSERIR ALUNO(A)!";
    }

    header("Location: ads_cadastrar_aluno.php");
} else {
    $_SESSION['erro'] = "ERRO AO INSERIR´ALUNO(A)!";
}
header("Location: ads_cadastrar_aluno.php");

