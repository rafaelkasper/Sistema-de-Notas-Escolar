<?php
//SALVA NO BD A PLANILHA DE NOTAS DA TURMA
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$turmas = $_POST['turma_id'];
$professores_id = $_POST['professor_id'];
$disciplina_id = $_POST['disciplina_id'];
$ano_letivo = $_POST['ano_letivo'];
$consult = $con->query("SELECT nome_disciplina FROM disciplinas WHERE id = $disciplina_id AND professor_id = $professores_id AND ano_letivo_id = $ano_letivo");
$materia = $consult->fetch_array();
$disc = $materia['nome_disciplina'];
foreach ($turmas as $valor_turmas) {
    $turma = $valor_turmas;
    $resultado = $con->query("SELECT id FROM alunos where turma = $turma");
    while ($alunos = $resultado->fetch_array()) {
        for ($i = 0; $i < count($alunos); $i++) {
            @$cadastro = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos[$i], $disciplina_id, $turma, $professores_id, 1, $ano_letivo)");
            @$cadastr = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos[$i], $disciplina_id, $turma, $professores_id, 2, $ano_letivo)");
            @$cadast = $con->query("INSERT INTO notas (aluno_id, disciplina_id, turmas_id, professores_id, trimestre_id, ano_letivo_id) VALUES ($alunos[$i], $disciplina_id, $turma, $professores_id, 3, $ano_letivo)");
            @$inserir = $con->query("INSERT INTO medias (aluno_id, turma_id, ano_letivo_id, trimestre_id) VALUES ($alunos[$i],$turma,$ano_letivo, 1)");
            @$insert = $con->query("INSERT INTO medias (aluno_id, turma_id, ano_letivo_id, trimestre_id) VALUES ($alunos[$i],$turma,$ano_letivo, 2)");
            @$ins = $con->query("INSERT INTO medias (aluno_id, turma_id, ano_letivo_id, trimestre_id) VALUES ($alunos[$i],$turma,$ano_letivo, 3)");
            if ($con) {
                $_SESSION['sucesso'] = "PLANILHA INSERIDA COM SUCESSO!";
            } else {
                $_SESSION['erro'] = "ERRO AO INSERIR PLANILHA!";
            }
        }
    }
}



header("Location: ads_cadastrar_planilha_notas.php");
