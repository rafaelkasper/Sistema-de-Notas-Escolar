<?php
//CALCULA A MÉDIA DAS NOTAS DIGITADAS E RETORNA PARA A PÁGINA DE DIGITAÇÃO
include '../functions/valida_sessao_professor.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PLANILHA DE NOTAS</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href='../css/personalizado.css' rel='stylesheet' />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        <?php
        include "../functions/conecta_banco.php";
        $nome_aluno = $_POST['nome_aluno'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        $nota4 = $_POST['nota4'];
        $nota5 = $_POST['nota5'];
        $nota6 = $_POST['nota6'];
        $nota7 = $_POST['nota7'];
        $nota8 = $_POST['nota8'];
        $nota9 = $_POST['nota9'];
        $nota10 = $_POST['nota10'];
        $data1 = $_POST['data1'];
        $data2 = $_POST['data2'];
        $data3 = $_POST['data3'];
        $data4 = $_POST['data4'];
        $data5 = $_POST['data5'];
        $data6 = $_POST['data6'];
        $data7 = $_POST['data7'];
        $data8 = $_POST['data8'];
        $data9 = $_POST['data9'];
        $data10 = $_POST['data10'];
        $descricao1 = $_POST['descricao1'];
        $descricao2 = $_POST['descricao2'];
        $descricao3 = $_POST['descricao3'];
        $descricao4 = $_POST['descricao4'];
        $descricao5 = $_POST['descricao5'];
        $descricao6 = $_POST['descricao6'];
        $descricao7 = $_POST['descricao7'];
        $descricao8 = $_POST['descricao8'];
        $descricao9 = $_POST['descricao9'];
        $descricao10 = $_POST['descricao10'];
        $turmas_id = $_POST['turma_id'];
        $disciplina_id = $_POST['disciplina_id'];
        $aluno_id = $_POST['aluno_id'];
        $ano_letivo = $_POST['ano_letivo'];
        $trimestre = $_POST['trimestre'];
        $media = $_POST['media'];
        $resultado = $con->query("SELECT nome_disciplina FROM disciplinas where id = '$disciplina_id' LIMIT 1");
        $materia = $resultado->fetch_array();
        $sucesso = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Avaliações alteradas com sucesso! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        $erro = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Erro ao alterar as avaliações! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        foreach (array($nota1) as $nota1) {
            foreach (array($nota2) as $nota2) {
                foreach (array($nota3) as $nota3) {
                    foreach (array($nota4) as $nota4) {
                        foreach (array($nota5) as $nota5) {
                            foreach (array($nota6) as $nota6) {
                                foreach (array($nota7) as $nota7) {
                                    foreach (array($nota8) as $nota8) {
                                        foreach (array($nota9) as $nota9) {
                                            foreach (array($nota10) as $nota10) {
                                                foreach (array($turmas_id) as $turmas_id) {
                                                    foreach (array($aluno_id) as $aluno_id) {
                                                        foreach (array($media) as $media) {
                                                            for ($i = 0; $i < count($nome_aluno); $i++) {
                                                                $faltas_disciplina = 'faltas_' . $materia[0];
                                                                $cadastro = $con->query("UPDATE notas SET nota1 = '$nota1[$i]', nota2 = '$nota2[$i]', nota3 = '$nota3[$i]', nota4 = '$nota4[$i]', nota5= '$nota5[$i]', nota6 = '$nota6[$i]', nota7 = '$nota7[$i]', nota8 = '$nota8[$i]', nota9 = '$nota9[$i]', nota10 = '$nota10[$i]', data1 = '$data1', data2 = '$data2', data3 = '$data3', data4 = '$data4', data5= '$data5', data6 = '$data6', data7 = '$data7', data8 = '$data8', data9 = '$data9', data10 = '$data10', descricao1 = '$descricao1', descricao2 = '$descricao2', descricao3 = '$descricao3', descricao4 = '$descricao4', descricao5= '$descricao5', descricao6 = '$descricao6', descricao7 = '$descricao7', descricao8 = '$descricao8', descricao9 = '$descricao9', descricao10 = '$descricao10', media = '$media[$i]' WHERE turmas_id = $turmas_id AND aluno_id = $aluno_id[$i] AND disciplina_id = $disciplina_id AND trimestre_id = $trimestre AND ano_letivo_id=$ano_letivo");
                                                                $inserir = $con->query("UPDATE medias SET $materia[0] = $media[$i] WHERE turma_id = $turmas_id AND aluno_id = $aluno_id[$i] AND trimestre_id = $trimestre AND ano_letivo_id=$ano_letivo");
                                                                $inserir_faltas = $con->query("UPDATE notas SET faltas = '$faltas[$i]' WHERE turmas_id = $turmas_id AND aluno_id = $aluno_id[$i] AND disciplina_id = $disciplina_id AND trimestre_id = $trimestre AND ano_letivo_id=$ano_letivo");
                                                                $inserir_falta = $con->query("UPDATE medias SET $faltas_disciplina = '$faltas[$i]' WHERE turma_id = '$turmas_id' AND aluno_id = '$aluno_id[$i]' AND trimestre_id = '$trimestre' AND ano_letivo_id='$ano_letivo'");
                                                                $_SESSION['turma'] = $turmas_id;
                                                                $_SESSION['disciplina_id'] = $disciplina_id;
                                                                $_SESSION['trimestre_id'] = $trimestre;
                                                                $_SESSION['ano_letivo'] = $ano_letivo;
                                                                header("Location: professor_proc_consulta_notas.php");
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


        $con->close();
        ?>
    </body>   
</html>

