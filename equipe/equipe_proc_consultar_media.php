<?php
//EXIBE AS MÉDIAS, FALTAS, FORMATIVA E DESCRITIVO DAS TURMAS
include '../functions/valida_sessao_equipe.php';
include '../functions/conecta_banco.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CONSULTAR MÉDIA</title>
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
        <script> $(".alert").alert()</script>

    </head>
    <header>
        <?php
        include 'menu_equipe.php';
        ?>

    </header>

    <body class="bg-light">
        <div class="container-fluid">
            <br>

            <h3>CONSULTAR MÉDIAS</h3>

            <?php
            //$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
            $SendPesqUser = $_POST['SendPesqUser'];
            if ($SendPesqUser) {
                $turma = $_POST['turma'];
                $trimestre = $_POST['trimestre_id'];
                $ano_letivo = $_POST['ano_letivo'];
            }
            ?>
             <?php
            $nome_turma = $con->query("SELECT * FROM turmas WHERE id = $turma");
            $nome_tur = $nome_turma->fetch_array();
            ?>
            <p class="bg-secondary text-white" style="text-align:center;"> <?php echo "TURMA " . $nome_tur['nome_turma']; ?></p>
 
            <form  method="POST" action="">
                <table class="table table-bordered table-hover p-0 m-0">
                    <tr class="bg-info p-0 m-0 text-white h-25" style="font-size: 14px; text-align:center;">
                        <th class='p-1 m-0 w-75'>NOME</th>
                        <th class='p-1 m-0 w-25'>ATITUDE</th>
                        <th class='p-1 m-0 w-25'>PORTUGUÊS</th>
                        <th class='p-1 m-0 w-25'>MATEMÁTICA</th>
                        <th class='p-1 m-0 w-25'>GEOGRAFIA</th>
                        <th class='p-1 m-0 w-25'>HISTÓRIA</th>
                        <th class='p-1 m-0 w-25'>CIÊNCIAS</th>
                        <th class='p-1 m-0 w-25'>E. FÍSICA</th>
                        <th class='p-1 m-0 w-25'>ARTES</th>
                        <th class='p-1 m-0 w-25'>E. RELIGIOSO</th>
                        <th class='p-1 m-0 w-25'>INGLÊS</th>
                        <th class='p-1 m-0 w-25'>ÉTICA</th>
                        <th class='p-1 m-0 w-25'>MÚSICA</th>

                        <th class='p-1 m-0 w-50'>DESCRITIVO</th>

                    </tr>
                    <?php
                    $consul = $con->query("SELECT id FROM disciplinas join notas on disciplinas.id=notas.disciplina_id where notas.turmas_id = $turma AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo GROUP BY disciplinas.nome_disciplina");
                    $disciplina_id = $consul ['id'];



                     $consultar = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = $trimestre AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                        while ($nomes = $consultar->fetch_array()) {
                        ?>
                        <tr class='h-25'>
                            <td class="p-1 m-0 align-middle"> <?php echo $nomes['nome_aluno']; ?> </td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'> <?php echo $nomes['atitude'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['Português'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['Matemática'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'> <?php echo $nomes['Geografia'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['História'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['Ciências'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['Educação_Física'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'> <?php echo $nomes['Artes'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['Ensino_Religioso'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['Inglês'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'> <?php echo $nomes['Ética'] ?></td>
                            <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['Música'] ?></td>



                        <input type="hidden" name="turma" value="<?php echo $turma; ?>">
                        <input type="hidden" name="trimestre" value="<?php echo $trimestre; ?>">
                        <input type="hidden" name="aluno_id[]" value="<?php echo $nomes['aluno_id'] ?>">
                        <input type="hidden" name="ano_letivo" value="<?php echo $ano_letivo; ?>">
                        <input type="hidden" name="nome_aluno[]" value="<?php echo $nomes['nome_aluno']; ?>">

                        <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $nomes['descritivo'] ?></td>

                        <?php
                    }



                    echo '</tr>';



                    $aluno_id[] = $nomes['aluno_id'];
                    ?>
                </table>
                <br>






                <a href="equipe_visualizar_medias.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>
                &nbsp; &nbsp; 


            </form>
            <br>
            <form action="equipe_gerar_excel_media.php" method="POST">
                <input type="hidden" name="turma" value="<?php echo $turma; ?>">
                <input type="hidden" name="trimestre" value="<?php echo $trimestre; ?>">
                <input type="hidden" name="ano_letivo" value="<?php echo $ano_letivo; ?>">
                <input type="hidden" name="nome_aluno[]" value="<?php echo $nomes['nome_aluno']; ?>">


                <input type="submit" class="btn btn-primary" value="GERAR PLANILHA">
                <form>
                    </div>
                    <?php include '../functions/rodape.php'; ?>
                    </body>
                    </html>
