<?php
include '../functions/valida_sessao_ads.php';
//ESSA PÁGINA ALTERA A PLANILHADE NOTAS CASO HAJA MUDANÇA DE ALUNOS NAS TURMAS
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ALTERAR PLANILHA DE NOTAS</title>
        <style type="text/css">
            .carregando{
                color:#ff0000;
                display:none;
            }
        </style>
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
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'> PLANILHA ALTERADA COM SUCESSO!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                unset($_SESSION['sucesso']);
            }

            if (isset($_SESSION['erro'])) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'> ERRO AO ALTERAR PLANILHA!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

                unset($_SESSION['erro']);
            }
            ?>
            <br>
            <br>

            <h3><i class="fas fa-table"></i>      ALTERAR PLANILHA DE NOTAS</h3> 
            <div class="container">
                <form method="POST"action="">
                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-2 text-center">
                            <label for="turma">TURMA</label>

                            <?php
                            $consulta = $con->query("SELECT * FROM turmas");
                            ?>
                            <select class="custom-select form-control" name="turma" required>
                                <option value="">SELECIONE</option>
                                <?php while ($class = $consulta->fetch_array()) { ?>
                                    <option value="<?php echo $class['id']; ?>"><?php echo $class['nome_turma']; ?></option>
                                <?php } ?>
                            </select>
                        </div>



                        <div class="form-group col-md-2 text-center">
                            <label for="professores_id">PROFESSOR</label>

                            <?php
                            $consul = $con->query("SELECT * FROM professores");
                            ?>
                            <select class="custom-select form-control"  name="professores_id" id="professor_id" required>
                                <option value="">SELECIONE</option>
                                <?php while ($profes = $consul->fetch_array()) { ?>
                                    <option value="<?php echo $profes['id']; ?>"><?php echo $profes['nome']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group col-md-2 text-center">
                            <label for="disciplina_id">DISCIPLINA</label>
                            <span class="carregando">Aguarde, carregando...</span>
                            <select class="custom-select form-control" name="disciplina_id" id="disciplina_id">
                                <option value="">SELECIONE</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2 text-center">
                            <label for="trimestre_id">TRIMESTRE</label>

                            <?php
                            $cons = $con->query("SELECT * FROM trimestre");
                            ?>
                            <select class="custom-select form-control"  name="trimestre_id" required>
                                <option value="">SELECIONE</option>
                                <?php while ($tri = $cons->fetch_array()) { ?>
                                    <option value="<?php echo $tri['id']; ?>"><?php echo $tri['nome_trimestre']; ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group col-md-2 text-center">
                            <label for="ano_letivo">ANO LETIVO</label>
                            <?php
                            $consulta = $con->query("SELECT * FROM ano_letivo");
                            ?>
                            <select id="ano_letivo" class="custom-select form-control" name="ano_letivo" required>
                                <option value="" selected>SELECIONE</option>
                                <?php while ($ano_letivo = $consulta->fetch_array()) { ?>
                                    <option value="<?php echo $ano_letivo['id']; ?>"><?php echo $ano_letivo['ano']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <br>
                            <p style="font-size: 16px; font-family: Trebuchet MS, sans-serif;"></p>

                            <input type="hidden" name="ads_id" value="<?php echo $ads_id; ?>">
                            <input id="pesq" name="SendPesqUser" style="color:white; font-weight: bolder;" type="submit" class="btn btn-primary btn-sm" value="PESQUISAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </form>
            </div>
            <br>	


            <div class="overflow-x:auto">
                <table class="table table-bordered table-hover p-0 m-0" id="pesquisar">
                    <thead class="bg-info text-white text-center">
                        <tr>
                            <th>NOME ALUNO</th>
                            <th>TURMA</th>
                            <th>PROFESSOR</th>
                            <th>DISCIPLINA</th>
                            <th>TRIMESTRE</th>
                            <th>ANO LETIVO</th>
                            <th>AÇÕES</th>

                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
                            if ($SendPesqUser) {
                                $turma = $_POST['turma'];
                                $professores_id = $_POST['professores_id'];
                                $disciplina_id = $_POST['disciplina_id'];
                                $trimestre = $_POST['trimestre_id'];
                                $ano_letivo = $_POST['ano_letivo'];
                                $resultado_usuario = $con->query("SELECT alunos.nome_aluno, notas.id, notas.aluno_id, notas.turmas_id, notas.disciplina_id, notas.professores_id, notas.trimestre_id, notas.ano_letivo_id FROM alunos join notas on alunos.id = notas.aluno_id join turmas on notas.turmas_id = turmas.id where notas.turmas_id = $turma AND notas.professores_id = $professores_id AND notas.disciplina_id = $disciplina_id AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo ORDER BY alunos.nome_aluno");
                                while ($rows = $resultado_usuario->fetch_assoc()) { {
                                        echo "<td>" . $rows['nome_aluno'] . "</td>";
                                        echo "<td class='align-middle' style='text-align: center;'>" . $rows['turmas_id'] . "</td>";
                                        echo "<td class='align-middle' style='text-align: center;'>" . $rows['professores_id'] . "</td>";
                                        echo "<td class='align-middle' style='text-align: center;'>" . $rows['disciplina_id'] . "</td>";
                                        echo "<td class='align-middle' style='text-align: center;'>" . $rows['trimestre_id'] . "</td>";
                                        echo "<td class='align-middle' style='text-align: center;'>" . $rows['ano_letivo_id'] . "</td>";
                                        echo "<td class='align-middle' style='text-align: center;'>";
                                        echo "<a class='btn btn-warning' href='ads_function_alterar_planilha.php?id=" . $rows['id'] . "'>Editar</a>&nbsp;&nbsp;&nbsp;";
                                        echo "<a class='btn btn-danger' href='ads_function_apagar_planilha.php?id=" . $rows['id'] . "'data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br>"
                                        . "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">
                google.load("jquery", "1.4.2");
            </script>

            <script type="text/javascript">
                $(function () {
                    $('#professor_id').change(function () {
                        if ($(this).val()) {
                            $('#disciplina_id').hide();
                            $('.carregando').show();
                            $.getJSON('../functions/disciplina.php?search=', {professor_id: $(this).val(), ajax: 'true'}, function (j) {
                                var options = '<option value="">SELECIONE</option>';
                                for (var i = 0; i < j.length; i++) {
                                    options += '<option value="' + j[i].id + '">' + j[i].nome_disciplina + '</option>';
                                }
                                $('#disciplina_id').html(options).show();
                                $('.carregando').hide();
                            });
                        } else {
                            $('#disciplina_id').html('<option value="">“SELECIONE“</option>');
                        }
                    });
                });
            </script>

            <?php include '../functions/rodape.php'; ?>
    </body>
</html>