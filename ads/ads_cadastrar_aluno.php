<?php
include '../functions/valida_sessao_ads.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CADASTRAR ALUNOS</title>
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

            <?php
            if (isset($_SESSION['sucesso'])) {
                echo "<br>";
                echo "<br>";
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'> ALUNO(A) INSERIDO(A) COM SUCESSO!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['sucesso']);
            }

            if (isset($_SESSION['erro'])) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'> ERRO AO INSERIR ALUNO(A)!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

                unset($_SESSION['erro']);
            }
            ?>
            <br>
            <br>

            <h3><i class="fas fa-user-graduate"></i>      CADASTRAR ALUNOS</h3>
            <form action="ads_function_cadastrar_aluno.php" method="POST">

                <div class="form-group">
                    <label for="nome_aluno">NOME</label>
                    <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" required="required">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="turma">TURMA</label>
                        <?php
                        $consulta = $con->query("SELECT * FROM turmas");
                        ?>
                        <select id="turma" class="custom-select form-control" name="turma" required>
                            <option value="" selected>Selecione</option>
                            <?php while ($class = $consulta->fetch_array()) { ?>
                                <option value="<?php echo $class['id']; ?>"><?php echo $class['nome_turma']; ?></option>
                            <?php } ?>
                        </select>
                    </div> 

                    <div class="form-group col-md-4">
                        <label for="chamada">NÚMERO DA CHAMADA</label>
                        <input type="text" class="form-control" id="chamada" name="chamada" required="required">
                    </div> 

                    <div class="form-group col-md-4">
                        <label for="ano_letivo">ANO LETIVO</label>
                        <?php
                        $consulta = $con->query("SELECT * FROM ano_letivo");
                        ?>
                        <select id="ano_letivo" class="custom-select form-control" name="ano_letivo" required>
                            <option value="" selected>Selecione</option>
                            <?php while ($ano_letivo = $consulta->fetch_array()) { ?>
                                <option value="<?php echo $ano_letivo['id']; ?>"><?php echo $ano_letivo['ano']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>        

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="telefone">TELEFONE</label>
                        <input type="text" class="form-control" id="telefone" name="telefone">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="login">LOGIN</label>
                        <input type="text" class="form-control" id="login" name="login">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="senha">SENHA</label>
                        <input type="text" class="form-control" id="senha" name="senha">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">CADASTRAR</button>
            </form>


            <?php include '../functions/rodape.php'; ?>
        </div>
    </body>
</html>
