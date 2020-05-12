<?php
//FORM PARA VISUALIZAR AS NOTAS POR DISCIPLINA
include '../functions/valida_sessao_equipe.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CONSULTAR NOTAS</title>
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
        include 'menu_equipe.php';
        ?>

    </header>
    <body class="bg-light">
        <div class="container">
            <br>
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<br>';
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <?php
            include '../functions/data_include.php';
            ?>
            <br>
            <br>
            <h3><i class="fas fa-award"></i>  CONSULTAR NOTAS</h3> 

            <form method="POST"action="equipe_proc_consulta_notas.php">
                <br>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="turma"  style="font-size: 16px;" class="col-sm-3 col-form-label">TURMA:   </label>


                        <?php
                        $consulta = $con->query("SELECT * FROM turmas");
                        ?>
                        <select class="custom-select form-control"  style="width: 150px;" name="turma" required>
                            <option value="">SELECIONE</option>
                            <?php while ($class = $consulta->fetch_array()) { ?>
                                <option value="<?php echo $class['id']; ?>"><?php echo $class['nome_turma']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="professor_id"  style="font-size: 16px;" class="col-sm-3 col-form-label">PROFESSOR(A):   </label>


                        <?php
                        $consul = $con->query("SELECT * FROM professores");
                        ?>
                        <select id="professor_id" class="custom-select form-control"  style="width: 150px;" name="professor_id" required>
                            <option value="">SELECIONE</option>
                            <?php while ($profes = $consul->fetch_array()) { ?>
                                <option value="<?php echo $profes['id']; ?>"><?php echo $profes['nome']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="disciplina_id"  style="font-size: 16px;" class="col-sm-3 col-form-label">DISCIPLINA:   </label>


                        <?php
                        $consult = $con->query("SELECT * FROM disciplinas");
                        ?>
                        <select id="disciplina_id" class="custom-select form-control"  style="width: 150px;" name="disciplina_id" required>
                            <option value="">SELECIONE</option>
                            <?php while ($materia = $consult->fetch_array()) { ?>
                                <option value="<?php echo $materia['id']; ?>"><?php echo $materia['nome_disciplina']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>





                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="trimestre_id"  style="font-size: 16px;" class="col-sm-3 col-form-label">TRIMESTRE:   </label>


                        <?php
                        $cons = $con->query("SELECT * FROM trimestre");
                        ?>
                        <select class="custom-select form-control"  style="width: 150px;" name="trimestre_id" required>
                            <option value="">SELECIONE</option>
                            <?php while ($tri = $cons->fetch_array()) { ?>
                                <option value="<?php echo $tri['id']; ?>"><?php echo $tri['nome_trimestre']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ano_letivo"  style="font-size: 16px;" class="col-sm-3 col-form-label">ANO LETIVO:   </label>

                        <?php
                        $consulta = $con->query("SELECT * FROM ano_letivo");
                        ?>
                        <select id="ano_letivo" class="custom-select form-control" style="width: 150px;" name="ano_letivo" required>
                            <option value="" selected>SELECIONE</option>
                            <?php while ($ano_letivo = $consulta->fetch_array()) { ?>
                                <option value="<?php echo $ano_letivo['id']; ?>"><?php echo $ano_letivo['ano']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="hidden" name="equipe_id" value="<?php echo $equipe_id; ?>">
                        <input id="pesq" name="SendPesqUser" style="color:white; font-weight: bolder;" type="submit" class="btn btn-primary btn-sm col-sm-6" value="PESQUISAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </form>
        </div>
        <br>	
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
                            var options = '<option value="">Selecione</option>';
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
