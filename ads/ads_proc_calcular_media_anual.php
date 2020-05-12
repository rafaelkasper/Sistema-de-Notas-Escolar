<?php
include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CONSULTAR MÉDIA ANUAL</title>
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
        <div class="container-fluid">
            <br>

            <h3><b><i class="far fa-bookmark"></i>    CONSULTAR MÉDIAS ANUAIS</b></h3>

                <?php
                 unset($nomes);
                        unset($nome);
                        unset($nom);
                //$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
                $SendPesqUser = $_POST['SendPesqUser'];
                if ($SendPesqUser) {
                    $turma = $_POST['turma'];
                   
                    $ano_letivo = $_POST['ano_letivo'];
                }
                ?>
            <?php
            $nome_turma = $con->query("SELECT * FROM turmas WHERE id = $turma");
            $nome_tur = $nome_turma->fetch_array();
            ?>
            <p class="bg-secondary text-white" style="text-align:center;"> <?php echo "TURMA " . $nome_tur['nome_turma']; ?></p>
 
            <form  method="POST" action="ads_salvar_formativa.php">
                <table class="table table-bordered table-hover p-0 m-0">
                    <tr class="bg-info p-0 m-0 text-white h-25 align-middle" style="font-size: 14px; text-align:center;">
                        <th class='p-1 m-0 w-75 align-middle'>NOME</th>
                     
                        <th colspan="5" class='p-1 m-0 w-25 align-middle'>PORTUGUÊS</th>
                        <th colspan="5" class='p-1 m-0 w-25 align-middle'>MATEMÁTICA</th>
                        <th colspan="5" class='p-1 m-0 w-25 align-middle'>GEOGRAFIA</th>
                         <th colspan="5" class='p-1 m-0 w-25 align-middle'>HISTÓRIA</th>
                         <th colspan="5" class='p-1 m-0 w-25 align-middle'>CIÊNCIAS</th>
                         <th colspan="5" class='p-1 m-0 w-25 align-middle'>E. FÍSICA</th>
                         <th colspan="5" class='p-1 m-0 w-25 align-middle'>ARTES</th>
                        <th colspan="5" class='p-1 m-0 w-25 align-middle'>E. RELIGIOSO</th>
                        <th colspan="5" class='p-1 m-0 w-25 align-middle'>INGLÊS</th>
                        <th colspan="5" class='p-1 m-0 w-25 align-middle'>ÉTICA</th>
                        <th colspan="5" class='p-1 m-0 w-25 align-middle'>MÚSICA</th>
                        <th class='p-1 m-0 w-25 align-middle'>FALTAS</th>
                        
                        
                        </tr>
<?php
                        $consul = $con->query("SELECT id FROM disciplinas join notas on disciplinas.id=notas.disciplina_id where notas.turmas_id = $turma AND notas.ano_letivo_id = $ano_letivo GROUP BY disciplinas.nome_disciplina");
                        $disciplina_id = $consul ['id'];

                    $consultar = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = 1 AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                   
                    $consulta = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = 2 AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                   //$nome = $consulta->fetch_array();
                   $consult = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = 3 AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                  //$nom = $consult->fetch_array();
                      
                  while (($nomes = $consultar->fetch_array())&& ($nome = $consulta->fetch_array())&& ($nom = $consult->fetch_array())) {
                             ?>
                        
                            <tr class='h-25'>
                            <td class='w-75 h-25 p-1 m-0 align-middle border border-dark'> <?php echo $nomes['nome_aluno'];?> </td>
                            <?php
                            @$p1= $nomes['Português']+$nomes['atitude'];
                            @$p2= $nome['Português']+$nome['atitude'];
                            @$p3= $nom['Português']+$nom['atitude'];
                            ?>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border border-dark' style='text-align: center;'><?php echo $p1 ?></td>
                                <td class='p-1 m-0 w-25 h-25 align-middle border border-dark' style='text-align: center;'><?php echo $p2  ?></td>
                               <td class='p-1 m-0 w-25 h-25 align-middle border border-dark' style='text-align: center;'><?php echo $p3  ?></td>
                               <?php $port= (($p1*1)+($p2*2)+($p3*3))/6;?>
                                <td class='p-1 m-0 w-25 h-25 align-middle border border-dark' style='text-align: center;'><strong><?php echo number_format($port,2);?></strong></td>
                                <td class='p-1 m-0 w-25 h-25 align-middle border border-dark' style='text-align: center;'><strong><?php if ($port>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>
                                
                                
                                  <?php
                            @$m1= $nomes['Matemática']+$nomes['atitude'];
                            @$m2= $nome['Matemática']+$nome['atitude'];
                            @$m3= $nom['Matemática']+$nom['atitude'];
                            ?>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $m1  ?></td>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $m2  ?></td>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $m3  ?></td>
                                  <?php $mat=(($m1*1)+($m2*2)+($m3*3))/6;?>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($mat,2)?></strong></td>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($mat>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                                  
                                  
                                <?php
                            @$g1= $nomes['Geografia']+$nomes['atitude'];
                            @$g2= $nome['Geografia']+$nome['atitude'];
                            @$g3= $nom['Geografia']+$nom['atitude'];
                            ?>  
                              <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $g1  ?></td>
                              <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $g2  ?></td>
                              <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $g3 ?></td>
                              <?php $geo=(($g1*1)+($g2*2)+($g3*3))/6;?>
                              <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($geo,2)?></strong></td>
                              <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($geo>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                              
                              <?php
                            @$h1= $nomes['História']+$nomes['atitude'];
                            @$h2= $nome['História']+$nome['atitude'];
                            @$h3= $nom['História']+$nom['atitude'];
                            ?>
                               <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $h1  ?></td>
                                <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $h2 ?></td>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $h3  ?></td>
                                 <?php $hist= (($h1*1)+($h2*2)+($h3*3))/6;?>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($hist,2)?></strong></td>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($hist>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                                  
                                  
                                  <?php
                            @$c1= $nomes['Ciências']+$nomes['atitude'];
                            @$c2= $nome['Ciências']+$nome['atitude'];
                            @$c3= $nom['Ciências']+$nom['atitude'];
                            ?>
                                <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $c1 ?></td>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $c2 ?></td>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $c3  ?></td>
                                  <?php $cie=(($c1*1)+($c2*2)+($c3*3))/6;?>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($cie,2)?></strong></td>
                                  <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($cie>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>
    
                                  
                                  
                                  <?php
                            @$ef1= $nomes['Educação_Física']+$nomes['atitude'];
                            @$ef2= $nome['Educação_Física']+$nome['atitude'];
                            @$ef3= $nom['Educação_Física']+$nom['atitude'];
                            ?>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $ef1?></td>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $ef2?></td>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $ef3?></td>
                                  <?php $edufis=(($ef1*1)+($ef2*2)+($ef3*3))/6;?>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($edufis,2)?></strong></td>
                                 <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($edufis>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                                 
                                 <?php
                            @$a1= $nomes['Artes']+$nomes['atitude'];
                            @$a2= $nome['Artes']+$nome['atitude'];
                            @$a3= $nom['Artes']+$nom['atitude'];
                            ?>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $a1?></td>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $a2?></td>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $a3?></td>
                           <?php $art=(($a1*1)+($a2*2)+($a3*3))/6;?>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($art,2)?></strong></td>
                            <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($art>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>
                            
                            
                            <?php
                            @$er1= $nomes['Ensino_Religioso']+$nomes['atitude'];
                            @$er2= $nome['Ensino_Religioso']+$nome['atitude'];
                            @$er3= $nom['Ensino_Religioso']+$nom['atitude'];
                            ?>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $er1?></td>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $er2?></td>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $er3?></td>
                            <?php $er=(($er1*1)+($er2*2)+($er3*3))/6;?>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($er,2)?></strong></td>
                            <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($er>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                            
                            
                             <?php
                            @$i1= $nomes['Inglês']+$nomes['atitude'];
                            @$i2= $nome['Inglês']+$nome['atitude'];
                            @$i3= $nom['Inglês']+$nom['atitude'];
                            ?>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $i1?></td>
                            <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $i2?></td>
                             <td class='p-1 m-0 w-25 h-25 align-middle' style='text-align: center;'><?php echo $i3?></td>
                              <?php $ing=(($i1*1)+($i2*2)+($i3*3))/6;?>
                             <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($ing,2)?></strong></td>
                              <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($ing>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                              
                              
                               <?php
                            @$e1= $nomes['Ética']+$nomes['atitude'];
                            @$e2= $nome['Ética']+$nome['atitude'];
                            @$e3= $nom['Ética']+$nom['atitude'];
                            ?>
                          <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $nomes['Ética']?></td>
                          <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $nome['Ética']?></td>
                          <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $nom['Ética']?></td>
                          <?php $eti=(($e1*1)+($e2*2)+($e3*3))/6;;?>
                          <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($eti,2)?></strong></td>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($eti>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                           
                           
                           
                            <?php
                            @$mu1= $nomes['Música']+$nomes['atitude'];
                            @$mu2= $nome['Música']+$nome['atitude'];
                            @$mu3= $nom['Música']+$nom['atitude'];
                            ?>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $mu1?></td>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $mu2?></td>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><?php echo $mu3?></td>
                            <?php $mus=(($mu1*1)+($mu2*2)+($mu3*3))/6;?>
                           <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php echo number_format($mus,2)?></strong></td>
                            <td class='p-1 m-0 w-25 h-25 align-middle border-dark' style='text-align: center;'><strong><?php if ($mus>=60){echo "APROVADO";} else {echo "REPROVADO";}?></strong></td>

                       <?php
                       @$total_faltas = $nomes['faltas_Artes'] + $nomes['faltas_Ciências'] + $nomes['faltas_Educação_Física'] + $nomes['faltas_Ensino_Religioso'] + $nomes['faltas_Ética'] + $nomes['faltas_Geografia'] + $nomes['faltas_História'] + $nomes['faltas_Inglês'] + $nomes['faltas_Matemática'] + $nomes['faltas_Música'] + $nomes['faltas_Português'];
                       
                       ?>
                            
                            <input type="hidden" name="turma" value="<?php echo $turma; ?>">
                
                     <input type="hidden" name="aluno_id[]" value="<?php echo $nomes['aluno_id'] ?>">
                    <input type="hidden" name="ano_letivo" value="<?php echo $ano_letivo; ?>">
                           <input type="hidden" name="nome_aluno[]" value="<?php echo  $nomes['nome_aluno']; ?>">
                           <td class='p-1 m-0 w-25 h-25 align-middle' style='text-align: center;'><?php echo $total_faltas?></td>
                        <td class='p-1 m-0 w-25 h-25 align-middle'><?php echo $nomes['descritivo']?></td>
                        
                        <?php
                        }



                        echo '</tr>';

                             
                            
                            $aluno_id[] = $nomes['aluno_id'];

                        ?>
                </table>
                <br>
                    
               
                 
                
                 
                   
                 <a href="ads_consultar_media.php" style="color:white; font-weight: bold;" class="btn btn-danger">VOLTAR</a>
                    &nbsp; &nbsp; 
           
                    </form>
            <br>
                <form action="ads_gerar_excel_media_final.php" method="POST">
                    <input type="hidden" name="turma" value="<?php echo $turma; ?>">
                    <input type="hidden" name="trimestre" value="<?php echo $trimestre; ?>">
                    <input type="hidden" name="ano_letivo" value="<?php echo $ano_letivo; ?>">
                    <input type="hidden" name="nome_aluno[]" value="<?php echo  $nomes['nome_aluno']; ?>">
                   
                   
                    <input type="submit" style="color:white; font-weight: bold;" class="btn btn-primary" value="GERAR PLANILHA">
                    <form>
                        <?php 
                       
                        ?>
                        </div>
<?php include '../functions/rodape.php';?>
                        </body>
                        </html>