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
        @$SendPesqUser = $_POST['SendPesqUser'];
        if ($SendPesqUser) {
            $professores_id = $_POST['professores_id'];
            $nome = $con->query("SELECT nome FROM professores WHERE id=$professores_id");
            $nome_professor = $nome->fetch_row();
            $ano_letivo = $_POST['ano_letivo'];
            $consulta = $con->query("SELECT * FROM horas WHERE professor_id=$professores_id");
            $linha = $consulta->num_rows;
            if ($linha == 0) {
                $cado = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 1, 0, 0, 0, 0, 0,0)");
                $cadastro = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 2, 0, 0, 0, 0, 0,0)");
                $cadastr = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 3, 0, 0, 0, 0, 0,0)");
                $cadast = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 4, 0, 0, 0, 0, 0,0)");
                $cadas = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 5, 0, 0, 0, 0, 0,0)");
                $cada = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 6, 0, 0, 0, 0, 0,0)");
                $cad = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 7, 0, 0, 0, 0, 0,0)");
                $ca = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 8, 0, 0, 0, 0, 0,0)");
                $c = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 9, 0, 0, 0, 0, 0,0)");
                $c1 = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 10, 0, 0, 0, 0, 0,0)");
                $c2 = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 11, 0, 0, 0, 0, 0,0)");
                $c3 = $con->query("INSERT INTO horas (professor_id, ano_letivo_id, mes, semana1, semana2, semana3, semana4, semana5, total) VALUES ($professores_id, $ano_letivo, 12, 0, 0, 0, 0, 0,0)");
                unset($consulta);
                unset($cadastro);
            }
        } else {
            
        }
        ?>
        <div class="container">
            <?php
            include '../functions/data_include.php';
            ?>
            <br>
            <br>
            <h3 style="padding-left: 5px;"><b>CADASTRAR HORAS</b></h3>
            <p class="bg-secondary text-white" style="text-align:center;"></p>
            <form  method="POST" action="ads_salvar_horas.php">
                <table class="table table-bordered table-hover p-0 m-0">
                    <p><?php echo "PROFESSOR(A): " . "<b>" . $nome_professor[0] . "</b>"; ?></p>
                    <tr class="bg-info p-0 m-0 text-white" style="font-size: 14px; text-align:center;">
                        <th>MÊS</th>
                        <th>SEMANA 1</th>
                        <th>SEMANA 2</th>
                        <th>SEMANA 3</th>
                        <th>SEMANA 4</th>
                        <th>SEMANA 5</th>
                        <th>MÉDIA</th>
                    </tr>
                    <?php
                    $resultado = $con->query("SELECT * FROM horas join professores on horas.professor_id = professores.id where horas.professor_id = $professores_id AND horas.ano_letivo_id = $ano_letivo");
                    while ($rows = $resultado->fetch_array()) {
                        ?>
                        <tr class="p-0 m-0">
                            <td class="w-25 p-1 m-0"><input type="text" readonly class="p-0 m-0 border-0" style="width: 100%;" name="mes[]" value="<?php echo $rows['mes']; ?>"></td>
                            <td class="p-1 m-0"><input type="text" class="w-75 p-0 m-0 border-0" style="text-align:center;" name="semana1[]" value="<?php echo $rows['semana1']; ?>"></td>
                            <td class="p-1 m-0"><input type="text" class="w-75 p-0 m-0 border-0" style="text-align:center;" name="semana2[]" value="<?php echo $rows['semana2']; ?>"></td>
                            <td class="p-1 m-0"><input type="text" class="w-75 p-0 m-0 border-0" style="text-align:center;" name="semana3[]" value="<?php echo $rows['semana3']; ?>"></td>
                            <td class="p-1 m-0"><input type="text" class="w-75 p-0 m-0 border-0" style="text-align:center;" name="semana4[]" value="<?php echo $rows['semana4']; ?>"></td>
                            <td class="p-1 m-0"><input type="text" class="w-75 p-0 m-0 border-0" style="text-align:center;" name="semana5[]" value="<?php echo $rows['semana5']; ?>"></td>
                            <?php
                            $num = ($rows['semana1']) + ($rows['semana2']) + ($rows['semana3']) + ($rows['semana4']) + ($rows['semana5']);
                            $num_part = explode(".", $num);
                            @$inteiro = $num_part[0];
                            @$decimal = $num_part[1];
                            if ($inteiro < 0) {
                                if ($decimal <= 50) {
                                    $total = $num;
                                }
                                if ($decimal >= 60) {
                                    $total = $num - 0.4;
                                }
                            } else if ($inteiro == 0) {
                                if ($decimal <= 5) {
                                    $total = $num;
                                }
                                if ($decimal >= 6) {
                                    $total = $num + 0.4;
                                }
                            } else {
                                if ($decimal <= 50) {
                                    $total = $num;
                                }
                                if ($decimal >= 60) {
                                    $total = $num + 0.4;
                                }
                            }
                            ?>
                            <td class="p-1 m-0"><input type="text" class="w-75 p-0 m-0 border-0" style="text-align:center;" name="total[]" value="<?php echo number_format($total, 2); ?>"></td>
                        <input type="hidden" name="ano_letivo" value="<?php echo $ano_letivo; ?>">
                        <input type="hidden" name="professor_id" value="<?php echo $professores_id; ?>">      
                        <input type="hidden" name="SendPesqUser" value="<?php echo $SendPesqUser; ?>"> 
                        <?php
                        echo "</tr>";
                    }
                    // Fim da tabela
                    echo ('</table>');
                    $con->close();
                    ?>
                    <br>
                    <a href="ads_cadastrar_horas.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>
                    &nbsp; &nbsp; 
                    <input  type="submit" style="color:white; font-weight: bold;" class="btn btn-warning" value="ALTERAR">
                    </form>
                    <br>
                    </div>
<?php include '../functions/rodape.php'; ?>
                    </body>
                    </html>