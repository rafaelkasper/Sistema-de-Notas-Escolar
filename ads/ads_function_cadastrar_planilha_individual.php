<?php
//SALVA NO BD A PLANILHA DE NOTAS INDIVIDUAL
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$alunos = $_POST['alunos'];
$turma = $_POST['turma_id'];
$professores_id = $_POST['professor_id'];
$disciplina_id = $_POST['disciplina_id'];
$ano_letivo = $_POST['ano_letivo'];
$consult = $con->query("SELECT nome_disciplina FROM disciplinas WHERE id = $disciplina_id AND professor_id = $professores_id AND ano_letivo_id = $ano_letivo");
$materia = $consult->fetch_array();
$disc = $materia['nome_disciplina'];
$aluno = 1;

//if ($aluno = 1) {
  //  $cadastro = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos, $disciplina_id, $turma, $professores_id, 1, $ano_letivo)");
   //$cadastr = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos, $disciplina_id, $turma, $professores_id, 2, $ano_letivo)");
   // $cadast = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos, $disciplina_id, $turma, $professores_id, 3, $ano_letivo)");
  // $inserir = $con->query("UPDATE medias SET turma_id = '$turma', ano_letivo_id = '$ano_letivo' WHERE aluno_id = '$alunos'");
    
   // if ($cadastro) {
       // $_SESSION['sucesso'] = "PLANILHA DE NOTAS INDIVIDUAL INSERIDA COM SUCESSO!";
    //} else {
    //    $_SESSION['erro'] = "ERRO AO INSERIR PLANILHA!";
   // }
    //header("Location: ads_cadastrar_planilha_individual.php");
//} else {
    $cadastro = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos, $disciplina_id, $turma, $professores_id, 1, $ano_letivo)");
    $cadastr = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos, $disciplina_id, $turma, $professores_id, 2, $ano_letivo)");
    $cadast = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos, $disciplina_id, $turma, $professores_id, 3, $ano_letivo)");
    $inse = $con->query("INSERT INTO medias (aluno_id, turma_id, ano_letivo_id, trimestre_id) VALUES ($alunos,$turma,$ano_letivo, 1)");
    $ins = $con->query("INSERT INTO medias (aluno_id, turma_id, ano_letivo_id, trimestre_id) VALUES ($alunos,$turma,$ano_letivo, 2)");
    $in = $con->query("INSERT INTO medias (aluno_id, turma_id, ano_letivo_id, trimestre_id) VALUES ($alunos,$turma,$ano_letivo, 3)");
    if ($cadastro) {
        $_SESSION['sucesso'] = "PLANILHA INSERIDA COM SUCESSO!";
    } else {
        $_SESSION['erro'] = "ERRO AO INSERIR PLANILHA!";
    }
    header("Location: ads_cadastrar_planilha_individual.php");
//}