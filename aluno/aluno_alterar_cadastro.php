<?php
//ALTERA DADOS CADASTRAIS DOS ALUNOS
include '../functions/valida_sessao_aluno.php';
include '../functions/conecta_banco.php';
$aluno_id = $_SESSION['alunos_id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ALTERAR CADASTRO</title>
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
        include 'menu_aluno.php';
        ?>

    </header>

    <body>

        <div class="container">

            <?php
            include '../functions/data_include.php';
            ?>
            <br>
            <br>

            <h3>ALTERAR CADASTRO</h3> 
            <div class="container">
                <form method="POST" action="">
                    <br>
                    <p>

                        <input type="hidden" name="aluno_id" value="<?php $aluno_id ?>">
                        <input class="btn btn-primary" id="pesq"name="SendPesqUser" type="submit" value="Pesquisar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </form>
            </div>
            <br>	
            <div class="overflow-x:auto">
                <table class="table table-bordered table-hover p-0 m-0" id="pesquisar">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>LOGIN</th>
                            <th>SENHA</th>


                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
                            if ($SendPesqUser) {

                                $resultado_usuario = $con->query("SELECT * FROM alunos WHERE id = '$aluno_id' ORDER BY nome_aluno");
                                while ($rows = $resultado_usuario->fetch_assoc()) { {
                                        echo "<td>" . $rows['nome_aluno'] . "</td>";
                                        echo "<td>" . $rows['login'] . "</td>";
                                        echo "<td>" . $rows['senha'] . "</td>";

                                        echo "<td>";
                                        echo "<a class='btn btn-warning' href='aluno_function_alterar_aluno.php?id=" . $rows['id'] . "'>Editar</a>&nbsp;&nbsp;&nbsp;" . "</td>";


                                        echo "</tr>";
                                    }
                                }
                            }
                            ?>
                    </tbody>
                </table>
            </div>

            <?php include '../functions/rodape.php'; ?>
    </body>
</html>