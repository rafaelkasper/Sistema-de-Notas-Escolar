<?php
//SALVA AS ALTERAÇÕES DOS ALUNOS NO BD
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = $_POST['id'];
$nome = ( isset($_POST['nome_aluno']) ) ? $_POST['nome_aluno'] : null;
$turma = ( isset($_POST['turma']) ) ? $_POST['turma'] : null;
$ano = ( isset($_POST['ano_letivo_id']) ) ? $_POST['ano_letivo_id'] : null;
$login = ( isset($_POST['login']) ) ? $_POST['login'] : null;
$senha = ( isset($_POST['senha']) ) ? $_POST['senha'] : null;
$status= ( isset($_POST['status']) ) ? $_POST['status'] : null;
$resultado_situacao = $con->query("SELECT * FROM  status  WHERE status = '$status'");
$rows = $resultado_situacao->fetch_assoc();                        
$status= $rows['id'];
var_dump($status);
$chamada = ( isset($_POST['chamada']) ) ? $_POST['chamada'] : null;
$senha = password_hash($senha, PASSWORD_DEFAULT);
$consultar = $con->query("SELECT login FROM alunos WHERE login='$login'");
$linha = $consultar->num_rows;
$consulta = $con->query("UPDATE alunos SET nome_aluno='$nome', turma='$turma', ano_letivo_id='$ano', login='$login', senha='$senha', status='$status', chamada='$chamada' WHERE id ='$id'");
$update = $con->query("UPDATE acesso SET login = '$login', senha = '$senha', status='$status' WHERE alunos_id = $id");
$updat = $con->query("UPDATE notas SET turmas_id='$turma' WHERE aluno_id ='$id'");
$upd = $con->query("UPDATE medias SET turma_id='$turma' WHERE aluno_id ='$id'");

if ($consulta) {
    $_SESSION['sucesso'] = "ALUNO(A) ALTERADO(A) COM SUCESSO!";
} else {
    $_SESSION['erro'] = "ERRO AO ALTERAR ALUNO(A)!";
}
header("Location: ads_alterar_alunos.php");
