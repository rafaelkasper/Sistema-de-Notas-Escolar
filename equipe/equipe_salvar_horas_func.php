<?php
include '../functions/valida_sessao_equipe.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>PLANILHA DE HORAS</title>
        <meta charset="UTF-8">

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

    <body class="bg-light">

        <?php
        include "../functions/conecta_banco.php";
        $func_id = $_POST['func_id'];
        $SendPesqUser = $_POST['SendPesqUser'];
        $semana1 = $_POST['semana1'];
        $semana2 = $_POST['semana2'];
        $semana3 = $_POST['semana3'];
        $semana4 = $_POST['semana4'];
        $semana5 = $_POST['semana5'];


        $ano_letivo = $_POST['ano_letivo'];
        $mes = $_POST['mes'];
        $total = $_POST['total'];




        $sucesso = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Avaliações alteradas com sucesso! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        $erro = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Erro ao alterar as avaliações! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        //$mensagem = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Atenção, as horas do mês $mes foram lançadas! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        $mensagem = "Atenção, as horas foram lançadas!";
        $inserir_mensagem = $con->query("INSERT INTO mensagens (func_id, mensagem, data) VALUES ($func_id, '$mensagem', NOW())");




        foreach (array($semana1) as $semana1) {
            foreach (array($semana2) as $semana2) {
                foreach (array($semana3) as $semana3) {
                    foreach (array($semana4) as $semana4) {
                        foreach (array($semana5) as $semana5) {
                            for ($i = 0; $i < count($mes); $i++) {
                                $cadastro = $con->query("UPDATE horas SET semana1 = $semana1[$i], semana2 = $semana2[$i], semana3 = $semana3[$i], semana4 = $semana4[$i], semana5= $semana5[$i], total = $total[$i] WHERE func_id = $func_id AND ano_letivo_id = $ano_letivo AND mes = $mes[$i]");
                            }
                        }
                    }
                }
            }
        }
        //  var_dump($total);
        //session_start();
        $_SESSION['func_id'] = $func_id;
        $_SESSION['ano_letivo'] = $ano_letivo;
        // var_dump($cadastro);


        header("Location: equipe_proc_cadastrar_horas_func1.php");


        $con->close();
        ?>
    </body>  
<?php include '../functions/rodape.php'; ?>
</html>

