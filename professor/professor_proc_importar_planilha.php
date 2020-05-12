<?php
//EXIBE OS DADOS IMPORTADOS DE PLANILHA EXCEL
include '../functions/valida_sessao_professor.php';
ini_set('display_errors', 0);
error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PLANILHA DE NOTAS</title>
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
        $professores_id = $_SESSION["professores_id"];
        $turmas_id = $_SESSION['turma_id'];
        $professores_id = $_SESSION['professores_id'];
        $disciplina_id = $_SESSION['disciplina_id'];
        $trimestre = $_SESSION['trimestre'];
        $ano_letivo = $_SESSION['ano_letivo'];
        $aluno_id = $_SESSION['aluno_id'];
        ?>
        <br>
        <div class="container-fluid">
            <?php include '../functions/data_include.php'; ?>
            <h3 style="padding-left: 5px;"><b>CADASTRAR NOTAS</b></h3>
            <?php
            if (!empty($_FILES['arquivo']['tmp_name'])) {
                $arquivo = new DomDocument();
                $arquivo->load($_FILES['arquivo']['tmp_name']);
                $linhas = $arquivo->getElementsByTagName("Row");
                $primeira_linha = true;
                ?>
                <form  id="formulario" method="POST" action="professor_salvar_importar_planilha.php">
                    <table class="table table-bordered table-hover p-0 m-0">
                        <tr class="bg-info p-0 m-0 text-body" style="font-size: 14px; text-align:center;">
                            <th>NOME</th>
                            <th>NOTA 1</th>
                            <th>NOTA 2</th>
                            <th>NOTA 3</th>
                            <th>NOTA 4</th>
                            <th>NOTA 5</th>
                            <th>NOTA 6</th>
                            <th>NOTA 7</th>
                            <th>NOTA 8</th>
                            <th>NOTA 9</th>
                            <th>NOTA 10</th>
                        </tr>
                        <?php
                        foreach ($linhas as $linha) {
                            if ($primeira_linha == false) {
                                for ($i = 0; $i < count($linha); $i++) {
                                    @$nome = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                                    @$nota1 = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                                    @$nota2 = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                                    @$nota3 = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                                    @$nota4 = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                                    @$nota5 = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                                    @$nota6 = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                                    @$nota7 = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                                    @$nota8 = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                                    @$nota9 = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                                    @$nota10 = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
                                    ?>
                                    <tr class="p-0 m-0">
                                        <td class="w-25 p-1 m-0 align-middle"><input type="text" class="p-0 m-0 border-0 bg-light" style="width: 100%;" name="nome_aluno[]" readonly value="<?php echo $nome; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota1[]" tabindex="1" value="<?php echo $nota1; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota2[]" tabindex="2" value="<?php echo $nota2; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota3[]" tabindex="3" value="<?php echo $nota3; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota4[]" tabindex="4" value="<?php echo $nota4; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota5[]" tabindex="5" value="<?php echo $nota5; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota6[]" tabindex="6" value="<?php echo $nota6; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota7[]" tabindex="7" value="<?php echo $nota7; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota8[]" tabindex="8" value="<?php echo $nota8; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota9[]" tabindex="9" value="<?php echo $nota9; ?>"></td>
                                        <td class="p-1 m-0 align-middle" style='text-align: center;'><input type="text" class="w-75 p-0 m-0 border-0 bg-light" style="text-align:center;" name="nota10[]" tabindex="10" value="<?php echo $nota10; ?>"></td>
                                        <?php
                                    }
                                }
                                $primeira_linha = false;
                            }
                        }
                        ?>
                </table>
                <br>
                <input type="hidden" name="turma_id" value="<?php echo $turmas_id; ?>">
                <input type="hidden" name="ano_letivo" value="<?php echo $ano_letivo; ?>">
                <input type="hidden" name="trimestre" value="<?php echo $trimestre; ?>">
                <input type="hidden" name="disciplina_id" value="<?php echo $disciplina_id; ?>">
                <input type="hidden" name="aluno_id[]" value="<?php echo $aluno_id; ?>">
                <a href="professor_importar_planilha_notas.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>
                &nbsp; &nbsp;
                <button  type="submit" style="color:white; font-weight: bold;" name="importar" id="importar" class="btn btn-warning">IMPORTAR</button>
                <br>
                </div>
                <?php include '../functions/rodape.php'; ?>
                </body>
                </html>
