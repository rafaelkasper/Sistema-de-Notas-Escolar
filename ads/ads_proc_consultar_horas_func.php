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
        include 'menu_ads.php';
        ?>

    </header>
    <body class="bg-light">
        <?php
        include '../functions/conecta_banco.php';



        //$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
        $SendPesqUser = $_POST['SendPesqUser'];
        if ($SendPesqUser) {

            $func_id = $_POST['func_id'];


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
$resultado = $con->query("SELECT funcionarios.nome FROM horas join funcionarios on horas.func_id = funcionarios.id where horas.func_id = $func_id AND horas.mes = $mes AND horas.ano_letivo_id = $ano_letivo");

$name = $resultado->fetch_row();
echo "<td>" . $name[0] . "</td>";


$result = $con->query("SELECT total FROM horas join funcionarios on horas.func_id = funcionarios.id where horas.func_id = $func_id AND horas.ano_letivo_id = $ano_letivo ORDER BY mes");

while ($rows = $result->fetch_row()) {
    $horas[] = $rows[0];
}
foreach ($horas as $hora) {
    echo "<td>" . $hora . "</td>";
}
$total0 = $horas[0];
$total1 = $horas[1];
$total2 = $horas[2];
$total3 = $horas[3];
$total4 = $horas[4];
$total5 = $horas[5];
$total6 = $horas[6];
$total7 = $horas[7];
$total8 = $horas[8];
$total9 = $horas[9];
$total10 = $horas[10];
$total11 = $horas[11];

$tot0 = (int) $total0;
$tot1 = (int) $total1;
// print_r($total0);
//print_r($tot0);
//$horario1 = $horas[0];
// $partes1 = explode(':', $horario1);
// $segundos1 = $partes1[0] * 3600 + $partes1[1] * 60 + $partes1[2];
//$negativo = $horario1 < 0; //Verifica se é um valor negativo
// $horario2 = $horas[1];
// $partes2 = explode(':', $horario2);
// $segundos2 = $partes2[0] * 3600 + $partes2[1] * 60 + $partes2[2];
//$horario3 = $horas[2];
//$partes3 = explode(':', $horario3);
//$segundos3 = $partes3[0] * 3600 + $partes3[1] * 60 + $partes3[2];
//$horario4 = $horas[3];
//$partes4 = explode(':', $horario4);
// $segundos4 = $partes4[0] * 3600 + $partes4[1] * 60 + $partes4[2];
// $horario5 = $horas[4];
// $partes5 = explode(':', $horario5);
// $segundos5 = $partes5[0] * 3600 + $partes5[1] * 60 + $partes5[2];
//$total= ($segundos1)+($segundos2)+( $segundos3)+( $segundos4)+( $segundos5);
// print_r($segundos2);
//$saldo = array_sum($horas);
//var_dump($horario1);
// $num = ($horas[0])+($horas[1])+($horas[2])+($horas[3])+($horas[4])+($horas[5])+($horas[6])+($horas[7])+($horas[8])+($horas[9])+($horas[10])+($horas[11]);  
// $num_part = explode(".", $num);
//   @$inteiro = $num_part[0];
// @$decimal = $num_part[1];
//print_r($inteiro);
//print_r($decimal);
// if ($inteiro> $num){
//  $total = $num + 0.4;
//  echo "<td>".number_format($total,2)."<td>";
//   }
// if ($inteiro<= $num){
// if($inteiro <0){
//$total = $num - 0.4;
// echo "<td>".number_format($total,2)."<td>";
//  }
// else{
//    $total = $num - 0.4;
//   echo "<td>".number_format($total,2)."<td>";
// }
//  }
$total = ($tot0) + ($tot1);
echo "<td>" . $total . "<td>";


echo "</tr>";



// Fim da tabela
echo ('</table>');

//var_dump($total);
$con->close();
?>

                    <br>


                    <a href="ads_consultar_horas_func.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>



            </form>
            <br>

        </div>
                    <?php include '../functions/rodape.php'; ?>
    </body>
</html>