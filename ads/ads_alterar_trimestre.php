<?php
include '../functions/valida_sessao_ads.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ALTERAR TRIMESTRE</title>
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
            if (isset($_SESSION['sucesso'])) {
                echo "<br>";
                echo "<br>";
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'> TRIMESTRE ALTERADO COM SUCESSO!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['sucesso']);
            }

            if (isset($_SESSION['erro'])) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'> ERRO AO ALTERAR TRIMESTRE!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['erro']);
            }
            ?>
            <br>
            <br>

            <h3><i class="far fa-calendar-times"></i>      ALTERAR TRIMESTRE</h3> 
            <div class="container">
                <form method="POST" action="">
                    <br>
                    <p>
                        &nbsp;&nbsp;&nbsp;DIGITE A PESQUISA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="caixa" maxlength="60" size="50"  name="nome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="pesq"name="SendPesqUser" class="btn btn-primary" type="submit" value="Pesquisar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </form>
            </div>
            <br>	
            <div class="overflow-x:auto">
                <table class="table table-bordered table-hover p-0 m-0" id="pesquisar">
                    <thead class="bg-info text-white text-center">
                        <tr>
                            <th>ID</th>
                            <th>TRIMESTRE</th>
                            <th>SITUAÇÃO</th>
                            <th>AÇÕES</th>

                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
                            if ($SendPesqUser) {
                                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                                $resultado_usuario = $con->query("SELECT * FROM trimestre WHERE nome_trimestre LIKE '%$nome%' ORDER BY nome_trimestre");
                                while ($rows = $resultado_usuario->fetch_assoc()) { {
                                        echo "<td class='align-middle' style='text-align: center;'>" . $rows['id'] . "</td>";

                                        echo "<td class='align-middle' style='text-align: center;'>" . $rows['nome_trimestre'] . "</td>";

                                        if ($rows['status'] == 1) {
                                            echo "<td class='align-middle' style='text-align: center;'>" . 'ATIVO' . "</td>";
                                        } else
                                            echo "<td class='align-middle' style='text-align: center;'>" . 'INATIVO' . "</td>";
                                        echo "<td class='align-middle' style='text-align: center;'>";
                                        echo "<a class='btn btn-warning' style='text-align: center;' href='ads_function_alterar_trimestre.php?id=" . $rows['id'] . "'>Editar</a>&nbsp;&nbsp;&nbsp;";
                                        echo "<a class='btn btn-danger' style='text-align: center;' href='ads_function_apagar_trimestre.php?id=" . $rows['id'] . "'data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br>"
                                        . "</td>";
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