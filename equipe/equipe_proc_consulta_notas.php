<?php
//EXIBE AS NOTAS DAS TURMAS POR DISCIPLINA
include '../functions/valida_sessao_equipe.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>PLANILHA DE NOTAS</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href='../css/personalizado.css' rel='stylesheet' />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <link rel="icon" type="image/png" href="../images/favicon.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </head>
    <header>
        <?php
        include 'menu_equipe.php';
        ?>

    </header>
    <body class="bg-light">
        <?php
        include '../functions/conecta_banco.php';



        //$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
        $SendPesqUser = $_POST['SendPesqUser'];
        if ($SendPesqUser) {
            $equipe = $_POST['equipe_id'];
            $turma = $_POST['turma'];
            $professores_id = $_POST['professor_id'];
            $disciplina_id = $_POST['disciplina_id'];
            $trimestre = $_POST['trimestre_id'];
            $ano_letivo = $_POST['ano_letivo'];
            $resultado = $con->query("SELECT * FROM alunos join notas on alunos.id = notas.aluno_id join turmas on notas.turmas_id = turmas.id where notas.turmas_id = $turma AND notas.professores_id = $professores_id AND notas.disciplina_id = $disciplina_id AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo AND alunos.status = 1");
            $datas = $resultado->fetch_array();
        }
        ?>

        <div class="container-fluid">
            <?php
            include '../functions/data_include.php';
            ?>
            <br>
            <h3 style="padding-left: 5px;"><b>CONSULTAR NOTAS</b></h3>
            <p class="bg-secondary text-white" style="text-align:center; font-family: Trebuchet MS, sans-serif;"> <?php echo "TURMA " . $datas['nome_turma']; ?></p>

            <table class="table table-bordered table-hover p-0 m-0">
                <tr class="bg-info p-0 m-0 text-white" style="font-size: 14px; text-align:center;">
                    <th>NOME</th>
                    <th>NOTA 1 <input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="data1" placeholder="Data" value="<?php echo $datas['data1']; ?>"><input type="text" class="w-100 p-0 m-0 border-0  bg-info text-white" style="text-align:center;" name="descricao1" placeholder="Descrição" value="<?php echo $datas['descricao1']; ?>"></th>
                    <th>NOTA 2 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data2" placeholder="Data" value="<?php echo $datas['data2']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao2" placeholder="Descrição" value="<?php echo $datas['descricao2']; ?>"></th>
                    <th>NOTA 3 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data3" placeholder="Data" value="<?php echo $datas['data3']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao3" placeholder="Descrição" value="<?php echo $datas['descricao3']; ?>"></th>
                    <th>NOTA 4 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data4" placeholder="Data" value="<?php echo $datas['data4']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao4" placeholder="Descrição" value="<?php echo $datas['descricao4']; ?>"></th>
                    <th>NOTA 5 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data5" placeholder="Data" value="<?php echo $datas['data5']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao5" placeholder="Descrição" value="<?php echo $datas['descricao5']; ?>"></th>
                    <th>NOTA 6 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data6" placeholder="Data" value="<?php echo $datas['data6']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao6" placeholder="Descrição" value="<?php echo $datas['descricao6']; ?>"></th>
                    <th>NOTA 7 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data7" placeholder="Data" value="<?php echo $datas['data7']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao7" placeholder="Descrição" value="<?php echo $datas['descricao7']; ?>"></th>
                    <th>NOTA 8 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data8" placeholder="Data" value="<?php echo $datas['data8']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao8" placeholder="Descrição" value="<?php echo $datas['descricao8']; ?>"></th>
                    <th>NOTA 9 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data9" placeholder="Data" value="<?php echo $datas['data9']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao9" placeholder="Descrição" value="<?php echo $datas['descricao9']; ?>"></th>
                    <th>NOTA 10 <input type="text" class="w-100 p-0 m-0 border-0 bg-info  text-white" style="text-align:center;" name="data10" placeholder="Data" value="<?php echo $datas['data10']; ?>"><input type="text" class="w-100 p-0 m-0 border-0 bg-info text-white" style="text-align:center;" name="descricao10" placeholder="Descrição" value="<?php echo $datas['descricao10']; ?>"></th>
                    <th>MÉDIA</th>

                </tr>

                <?php
                $result = $con->query("SELECT * FROM alunos join notas on alunos.id = notas.aluno_id join turmas on notas.turmas_id = turmas.id where notas.turmas_id = $turma AND notas.professores_id = $professores_id AND notas.disciplina_id = $disciplina_id AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo AND alunos.status = 1 order by CAST(alunos.chamada AS unsigned)");
                while ($rows = $result->fetch_array()) {
                    ?>
                    <tr class="p-0 m-0">
                        <td class="w-25 p-1 m-0"><?php echo $rows['nome_aluno']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;' ><?php echo $rows['nota1']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;' ><?php echo $rows['nota2']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $rows['nota3']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;' ><?php echo $rows['nota4']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;' ><?php echo $rows['nota5']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $rows['nota6']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;' ><?php echo $rows['nota7']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;' ><?php echo $rows['nota8']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;' ><?php echo $rows['nota9']; ?></td>
                        <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo $rows['nota10']; ?></td>
                        <?php
                        $colunas = 10;
                        if (empty($rows['nota1'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota2'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota3'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota4'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota5'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota6'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota7'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota8'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota9'])) {
                            $colunas = $colunas - 1;
                        }
                        if (empty($rows['nota10'])) {
                            $colunas = $colunas - 1;
                        }

                        @$soma = $rows['nota1'] + $rows['nota2'] + $rows['nota3'] + $rows['nota4'] + $rows['nota5'] + $rows['nota6'] + $rows['nota7'] + $rows['nota8'] + $rows['nota9'] + $rows['nota10'];

                        if (empty($soma)) {
                            $media = 0;
                        } else {
                            $media = $soma / $colunas;
                        }


                        $turmas_id = $rows['turmas_id'];
                        $disciplina_id = $rows['disciplina_id'];
                        $aluno_id = $rows['aluno_id'];
                        ?>
                    <input type="hidden" name="turma_id[]" value="<?php echo $turmas_id; ?>">
                    <input type="hidden" name="disciplina_id[]" value="<?php echo $disciplina_id; ?>">
                    <input type="hidden" name="aluno_id[]" value="<?php echo $aluno_id; ?>">             
                    <td class="p-1 m-0 align-middle" style='text-align: center;'><?php echo round($media); ?></td>


                    <?php
                    echo "</tr>";
                }


                // Fim da tabela
                echo ('</table>');


                $con->close();
                ?>

                <br>


                <a href="equipe_visualizar_notas.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>
                &nbsp; &nbsp; 

                <br>

                </div>
                <?php include '../functions/rodape.php'; ?>
                </body>
                </html>