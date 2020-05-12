<?php
//EXIBE A MÉDIA FINAL COM A NOTA FORMATIVA
include '../functions/valida_sessao_professor.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PLANILHA DE MEDIAS</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../images/favicon.ico"/>
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
    <header>
        <?php
        include 'menu_professor.php';
        ?>
    </header>
    <body class="bg-light">
        <?php
        include '../functions/conecta_banco.php';
        @$SendPesqUser = $_POST['SendPesqUser'];
        $turma = $_POST['turma'];
        $disciplina_id = $_POST['disciplina_id'];
        $trimestre = $_POST['trimestre_id'];
        $ano_letivo = $_POST['ano_letivo'];
        $resultado = $con->query("SELECT nome_disciplina FROM disciplinas where professor_id = $professores_id AND ano_letivo_id = $ano_letivo AND id = $disciplina_id");
        $disciplina = $resultado->fetch_array();
        ?>
        <div class="container">
            <?php
            include '../functions/data_include.php';
            ?>
            <br>
            <h3 style="padding-left: 5px;"><b><i class="far fa-bookmark"></i>   CONSULTAR MÉDIA</b></h3>
             <?php
            $nome_disciplina = $con->query("SELECT * FROM disciplinas WHERE id = $disciplina_id");
            $nome_discip = $nome_disciplina->fetch_array();
             $resultado = $con->query("SELECT * FROM alunos join notas on alunos.id = notas.aluno_id join turmas on notas.turmas_id = turmas.id where notas.turmas_id = $turma AND notas.professores_id = $professores_id AND notas.disciplina_id = $disciplina_id AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo AND alunos.status = 1");
            $datas = $resultado->fetch_array();
            ?>
            <p class="bg-secondary text-white" style="text-align:center;"> <?php echo "TURMA " . $datas['nome_turma']; ?><br><?php echo $nome_discip[1]; ?></p>
           
            <form  id="formulario" method="POST" action="">
                <table class="table table-bordered table-hover p-0 m-0">
                    <tr class="bg-info p-0 m-0 text-body" style="font-size: 14px; text-align:center;">
                        <th>NOME</th>
                        <th>FORMATIVA</th>
                        <th>MÉDIA DISCIPLINA</th>
                        <th>MÉDIA FINAL</th>
                        <th>FALTAS</th>
                    </tr>
                    <?php
                    $media_disciplina = 'medias_' . $disciplina[0];
                    $faltas_disciplina = 'faltas_' . $disciplina[0];
                    $consultar = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = $trimestre AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                    
                    
                    while ($rows = $consultar->fetch_array()) {
                        @$media_final = $rows['atitude'] + $rows[$disciplina[0]];
                        ?>
                        <tr class="p-0 m-0">
                            <td class="p-1 m-0 align-middle"><input type="text" class="p-0 m-0 border-0 bg-light" style="width: 100%;"  readonly value="<?php echo $rows['nome_aluno']; ?>"></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="p-0 m-0 border-0 bg-light" style="width: 100%; text-align:center;"  readonly value="<?php echo $rows['atitude']; ?>"></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="p-0 m-0 border-0 bg-light" style="width: 100%; text-align:center;" readonly value="<?php echo $rows[$disciplina[0]]; ?>"></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="p-0 m-0 border-0 bg-light" style="width: 100%; text-align:center;" readonly value="<?php echo $media_final;?>"></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="p-0 m-0 border-0 bg-light" style="width: 100%; text-align:center;" readonly value="<?php echo $rows[$faltas_disciplina]; ?>"></td>
                           <?php
                         echo "</tr>";
                        }
// Fim da tabela
                        echo ('</table>');
                        $con->close();
                        ?>
                    <br>
                    <a href="professor_consultar_media.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>
                    &nbsp; &nbsp; 
            </form>
            <br>
        </div>
        <?php include '../functions/rodape.php'; ?>
    </body>
    <script>
        </html>