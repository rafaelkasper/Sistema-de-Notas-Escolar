<?php
//EDITA AS INFORMAÇÕES SOBRE AS DISCIPLINAS
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$resultado_usuario = $con->query("SELECT * FROM disciplinas WHERE id = '$id'");
$row_usuario = $resultado_usuario->fetch_assoc();
$id_antigo = $row_usuario['professor_id'];
?>


<!DOCTYPE html>
<html>
    <head>
        <title>ALTERAR DISCIPLINA</title>
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
        include 'menu_ads.php';
        ?>

    </header>

    <body class="bg-light">

        <div class="container">

            <?php
            include '../functions/data_include.php';
            ?>
            <br>
            <br>

            <h3>ALTERAR DISCIPLINA</h3>
            <form action="ads_function_salvar_alterar_disciplina.php" method="POST">

                <div class="form-group">
                    <label for="nome_disciplina">DISCIPLINA</label>
                    <input type="text" class="form-control" id="nome_aluno" name="nome_disciplina" value="<?php echo $row_usuario["nome_disciplina"]; ?>">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="professor_id">PROFESSOR</label>
                        <input type="text" class="form-control" id="professor_id" name="professor_id" value="<?php echo $row_usuario["professor_id"]; ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="ano_letivo">ANO LETIVO</label>
                        <input type="text" class="form-control" id="ano_letivo" name="ano_letivo_id" value="<?php echo $row_usuario["ano_letivo_id"]; ?>">
                    </div>
                </div>



                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="id_antigo" value="<?php echo $id_antigo; ?>">
                <button type="submit" class="btn btn-primary">ALTERAR</button>
            </form>



        </div>
        <?php include '../functions/rodape.php'; ?>
    </body>
</html>