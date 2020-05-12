<?php
include '../functions/valida_sessao_ads.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>PLANILHA DE HORAS</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../images/favicon.ico"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href=../css/personalizado.css' rel='stylesheet' />
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
        include 'menu_ads.php';
        ?>

    </header>
    <body class="bg-light">
        <?php
        include '../functions/conecta_banco.php';



        //$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
        $SendPesqUser = $_POST['SendPesqUser'];
        if ($SendPesqUser) {

            $professores_id = $_POST['professores_id'];


            $ano_letivo = $_POST['ano_letivo'];
        }
        ?>

        <div class="container">
        <?php
        include '../functions/data_include.php';
        ?>
            <br>
            <br>
            <h3 style="padding-left: 5px;"><b>CONSULTAR HORAS</b></h3>

            <p class="bg-secondary text-white" style="text-align:center;"></p>
            <form>
                <table class="table table-bordered table-hover p-0 m-0">
                    <tr class="bg-info p-0 m-0 text-white" style="font-size: 14px; text-align:center;">
                        <th>NOME</th>
                        <th>JANEIRO</th>
                        <th>FEVEREIRO</th>
                        <th>MARÇO</th>
                        <th>ABRIL</th>
                        <th>MAIO</th>
                        <th>JUNHO</th>
                        <th>JULHO</th>
                        <th>AGOSTO</th>
                        <th>SETEMBRO</th>
                        <th>OUTUBRO</th>
                        <th>NOVEMBRO</th>
                        <th>DEZEMBRO</th>
                        <th>SALDO</th>
                    </tr>


<?php
echo "<tr style='font-size: 14px; text-align:center;'>";
$resultado = $con->query("SELECT professores.nome FROM horas join professores on horas.professor_id = professores.id where horas.professor_id = $professores_id AND horas.mes = $mes AND horas.ano_letivo_id = $ano_letivo");

$name = $resultado->fetch_row();
echo "<td>" . $name[0] . "</td>";


$result = $con->query("SELECT total FROM horas join professores on horas.professor_id = professores.id where horas.professor_id = $professores_id AND horas.ano_letivo_id = $ano_letivo ORDER BY mes");

while ($rows = $result->fetch_row()) {
    $horas[] = $rows[0];
}
foreach ($horas as $hora) {
    echo "<td>" . $hora . "</td>";
}


$somar = $con->query("SELECT SUM(total) FROM horas join professores on horas.professor_id = professores.id where horas.professor_id = $professores_id AND horas.ano_letivo_id = $ano_letivo");
$soma = $somar->fetch_row();

$num = $soma[0];

$num_part = explode(".", $num);
@$inteiro = $num_part[0];
@$decimal = $num_part[1];

if ($inteiro < 0) {
    if ($decimal <= 50) {
        $total = $num;
        echo "<td>" . number_format($total, 2) . "</td>";
    }
    if ($decimal >= 60) {
        $total = $num - 0.4;
        echo "<td>" . number_format($total, 2) . "</td>";
    }
} else if ($inteiro == 0) {
    if ($decimal <= 5) {
        $total = $num;
        echo "<td>" . number_format($total, 2) . "</td>";
    }
    if ($decimal >= 6) {
        $total = $num + 0.4;
        echo "<td>" . number_format($total, 2) . "</td>";
    }
} else {
    if ($decimal <= 50) {
        $total = $num;
        echo "<td>" . number_format($total, 2) . "</td>";
    }
    if ($decimal >= 60) {
        $total = $num + 0.4;
        echo "<td>" . number_format($total, 2) . "</td>";
    }
}
echo "</tr>";


// Fim da tabela
echo ('</table>');

//var_dump($total);
$con->close();
?>

                    <br>


                    <a href="ads_consultar_horas.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>



            </form>
            <br>

        </div>
        <?php include '../functions/rodape.php'; ?>
    </body>
</html>