<?php
//FUNÇÃO PARA ENVIAR PLANILHA DE NOTAS PARA O SISTEMA
include '../functions/valida_sessao_professor.php';
include "../functions/conecta_banco.php";
$professores_id = $_SESSION["professores_id"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>IMPORTAR PLANILHA DE NOTAS</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="../images/favicon.ico"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <link href='../css/personalizado.css' rel='stylesheet' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script> $(".alert").alert()</script>
    </head>
    <header>
        <?php
        include 'menu_professor.php';
        ?>
    </header>
    <body class="bg-light">
        <div class="container">
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<br>';
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            include '../functions/data_include.php';
            @$SendPesqUser = $_POST['SendPesqUser'];
            if ($SendPesqUser) {
                $turma = $_POST['turma'];
                $disciplina_id = $_POST['disciplina_id'];
                $trimestre = $_POST['trimestre_id'];
                $ano_letivo = $_POST['ano_letivo'];
                $resultado = $con->query("SELECT alunos.id FROM alunos join notas on alunos.id = notas.aluno_id join turmas on notas.turmas_id = turmas.id where notas.turmas_id = $turma AND notas.professores_id = $professores_id AND notas.disciplina_id = $disciplina_id AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo AND alunos.status = 1 order by CAST(alunos.chamada AS unsigned)");
                while ($datas = $resultado->fetch_array()) {
                    $aluno_id[] = $datas['id'];
                }
            }
            ?>
            <br>
            <br>
            <h3>IMPORTAR PLANILHA DE NOTAS</h3>
            <form method="POST" action="professor_proc_importar_planilha.php" enctype="multipart/form-data">
                <div class="form-group col-sm-6">
                    <div class="input-group input-file" name="arquivo">
                        <input type="text" class="form-control" placeholder='Escolha um arquivo...' />&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary pull-right">Enviar</button>&nbsp;&nbsp;
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
            <?php
            $_SESSION['turma_id'] = $turma;
            $_SESSION['professores_id'] = $professores_id;
            $_SESSION['disciplina_id'] = $disciplina_id;
            $_SESSION['trimestre'] = $trimestre;
            $_SESSION['ano_letivo'] = $ano_letivo;
            $_SESSION['aluno_id'] = $aluno_id;
            include '../functions/rodape.php';
            ?>
    </body>
    <script>function bs_input_file() {
            $(".input-file").before(
                    function () {
                        if (!$(this).prev().hasClass('input-ghost')) {
                            var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                            element.attr("name", $(this).attr("name"));
                            element.change(function () {
                                element.next(element).find('input').val((element.val()).split('\\').pop());
                            });
                            $(this).find("button.btn-choose").click(function () {
                                element.click();
                            });
                            $(this).find("button.btn-reset").click(function () {
                                element.val(null);
                                $(this).parents(".input-file").find('input').val('');
                            });
                            $(this).find('input').css("cursor", "pointer");
                            $(this).find('input').mousedown(function () {
                                $(this).parents('.input-file').prev().click();
                                return false;
                            });
                            return element;
                        }
                    }
            );
        }
        $(function () {
            bs_input_file();
        });
    </script>
</html>