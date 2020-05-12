<?php

include '../functions/valida_sessao_ads.php';
include '../functions/conecta_banco.php';
$turma = $_POST['turma'];
$trimestre = $_POST['trimestre'];
$ano_letivo = $_POST['ano_letivo'];

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Planilha de Médias</title>
    </head>
    <body class="bg-light">
        <?php
        // Definimos o nome do arquivo que serÃ¡ exportado
        $arquivo = 'media anual.xls';

        // Criamos uma tabela HTML com o formato da planilha
        $html = '';
        $html .= "<table>";
                     $html .="<tr>";
                         $html .="<th>NOME</th>";
                     
                         $html .="<th colspan='5'>PORTUGUÊS</th>";
                         $html .="<th colspan='5'>MATEMÁTICA</th>";
                         $html .="<th colspan='5'>GEOGRAFIA</th>";
                          $html .="<th colspan='5'>HISTÓRIA</th>";
                          $html .="<th colspan='5'>CIÊNCIAS</th>";
                         $html .="<th colspan='5'>E. FÍSICA</th>";
                         $html .="<th colspan='5'>ARTES</th>";
                        $html .="<th colspan='5'>E. RELIGIOSO</th>";
                        $html .="<th colspan='5'>INGLÊS</th>";
                        $html .="<th colspan='5'>ÉTICA</th>";
                        $html .="<th colspan='5'>MÚSICA</th>";
                        $html .="<th>FALTAS</th>";
                        //$html .="<th></th>";
                        
                        $html .="</tr>";
            
            $consul = $con->query("SELECT id FROM disciplinas join notas on disciplinas.id=notas.disciplina_id where notas.turmas_id = $turma AND notas.ano_letivo_id = $ano_letivo GROUP BY disciplinas.nome_disciplina");
                        $disciplina_id = $consul ['id'];

                    $consultar = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = 1 AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                   
                    $consulta = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = 2 AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                  
                   $consult = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = 3 AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                
                      
                  while (($nomes = $consultar->fetch_array())&& ($nome = $consulta->fetch_array())&& ($nom = $consult->fetch_array())) {
                            
                        
                            $html .="<tr>";
                            $html .="<td>". $nomes['nome_aluno']."</td>";
                            
                                
                            @$p1= $nomes['Português']+$nomes['atitude'];
                            @$p2= $nome['Português']+$nome['atitude'];
                            @$p3= $nom['Português']+$nom['atitude'];
                           
                                  $html .="<td>".$p1."</td>";
                                $html .="<td>". $p2."</td>";
                               $html .="<td>".$p3."</td>";
                               $port= (($p1*1)+($p2*2)+($p3*3))/6;
                                $html .="<td>". number_format($port,2)."</td>";
                                
                                if($port>=50){$rp="APROVADO";} else {$rp="REPROVADO";};
                                $html .="<td>".$rp."</td>";
                                
                                
                                
                            @$m1= $nomes['Matemática']+$nomes['atitude'];
                            @$m2= $nome['Matemática']+$nome['atitude'];
                            @$m3= $nom['Matemática']+$nom['atitude'];
                            
                                  $html .="<td>". $m1."</td>";
                                  $html .="<td>".$m2."</td>";
                                  $html .="<td>".$m3."</td>";
                                  $mat=(($m1*1)+($m2*2)+($m3*3))/6;
                                  $html .="<td>".number_format($mat,2)."</td>";
                                  if ($mat>=50){$rm= "APROVADO";} else {$rm= "REPROVADO";};
                                  $html .="<td>".$rm. "</td>";

                                  
                                
                            @$g1= $nomes['Geografia']+$nomes['atitude'];
                            @$g2= $nome['Geografia']+$nome['atitude'];
                            @$g3= $nom['Geografia']+$nom['atitude'];
                            
                             $html .="<td>".$g1."</td>";
                              $html .="<td>".$g2."</td>";
                              $html .="<td>".$g3."</td>";
                             $geo=(($g1*1)+($g2*2)+($g3*3))/6;
                              $html .="<td>".number_format($geo,2)."</td>";
                              if ($geo>=50){$rg= "APROVADO";} else {$rg="REPROVADO";};
                              $html .="<td>".$rg."</td>";

                              
                              
                            @$h1= $nomes['História']+$nomes['atitude'];
                            @$h2= $nome['História']+$nome['atitude'];
                            @$h3= $nom['História']+$nom['atitude'];
                            
                               $html .="<td'>".$h1."</td>";
                                $html .="<td>".$h2."</td>";
                                 $html .="<td>".$h3."</td>";
                                 $hist= (($h1*1)+($h2*2)+($h3*3))/6;
                                 $html .="<td>".number_format($hist,2)."</td>";
                                  if ($hist>=50){$rh= "APROVADO";} else {$rh= "REPROVADO";};
                                  $html .="<td>".$rh."</td>";

                                  
                                  
                                 
                            @$c1= $nomes['Ciências']+$nomes['atitude'];
                            @$c2= $nome['Ciências']+$nome['atitude'];
                            @$c3= $nom['Ciências']+$nom['atitude'];
                            
                                $html .="<td>".$c1."</td>";
                                 $html .="<td>".$c2."</td>";
                                  $html .="<td>".$c3."</td>";
                                 $cie=(($c1*1)+($c2*2)+($c3*3))/6;
                                  $html .="<td>".number_format($cie,2)."</td>";
                                  if ($cie>=50){$rc= "APROVADO";} else {$rc= "REPROVADO";};
                                  $html .="<td>".$rc."</td>";
    
                                  
                              
                            @$ef1= $nomes['Educação_Física']+$nomes['atitude'];
                            @$ef2= $nome['Educação_Física']+$nome['atitude'];
                            @$ef3= $nom['Educação_Física']+$nom['atitude'];
                            
                                 $html .="<td>".$ef1."</td>";
                                 $html .="<td>".$ef2."</td>";
                                 $html .="<td>".$ef3."</td>";
                                $edufis=(($ef1*1)+($ef2*2)+($ef3*3))/6;
                                 $html .="<td>".number_format($edufis,2)."</td>";
                                 if ($edufis>=50){$ref= "APROVADO";} else {$ref= "REPROVADO";};
                                 $html .="<td>".$ref."</td>";

                                
                            @$a1= $nomes['Artes']+$nomes['atitude'];
                            @$a2= $nome['Artes']+$nome['atitude'];
                            @$a3= $nom['Artes']+$nom['atitude'];
                            
                           $html .="<td>".$a1."</td>";
                           $html .="<td>".$a2."</td>";
                           $html .="<td>".$a3."</td>";
                          $art=(($a1*1)+($a2*2)+($a3*3))/6;
                           $html .="<td>".number_format($art,2)."</td>";
                           if ($art>=50){$ra= "APROVADO";} else {$ra= "REPROVADO";}
                            $html .="<td>".$ra."</td>";
                            
                            
                            
                            @$er1= $nomes['Ensino_Religioso']+$nomes['atitude'];
                            @$er2= $nome['Ensino_Religioso']+$nome['atitude'];
                            @$er3= $nom['Ensino_Religioso']+$nom['atitude'];
                            
                           $html .="<td>".$er1."</td>";
                           $html .="<td>".$er2."</td>";
                           $html .="<td>".$er3."</td>";
                           $er=(($er1*1)+($er2*2)+($er3*3))/6;
                           $html .="<td>".number_format($er,2)."</td>";
                           if ($er>=50){$rer="APROVADO";} else {$rer="REPROVADO";};
                            $html .="<td>".$rer."</td>";

                            
                            
                            
                            @$i1= $nomes['Inglês']+$nomes['atitude'];
                            @$i2= $nome['Inglês']+$nome['atitude'];
                            @$i3= $nom['Inglês']+$nom['atitude'];
                            
                           $html .="<td>".$i1."</td>";
                            $html .="<td>".$i2."</td>";
                             $html .="<td>". $i3."</td>";
                             $ing=(($i1*1)+($i2*2)+($i3*3))/6;
                             $html .="<td>".number_format($ing,2)."</td>";
                             if ($ing>=50){$ri="APROVADO";} else {$ri="REPROVADO";}
                              $html .="<td>".$ri."</td>";

                              
                              
                               
                            @$e1= $nomes['Ética']+$nomes['atitude'];
                            @$e2= $nome['Ética']+$nome['atitude'];
                            @$e3= $nom['Ética']+$nom['atitude'];
                            
                          $html .="<td>".$e1."</td>";
                          $html .="<td>". $e2."</td>";
                          $html .="<td>".$e3."</td>";
                         $eti=(($e1*1)+($e2*2)+($e3*3))/6;;
                          $html .="<td>".number_format($eti,2)."</td>";
                          if ($eti>=50){$re="APROVADO";} else {$re="REPROVADO";}
                          $html .= "<td>".$re."</td>";

                           
                           
                           
                         
                            @$mu1= $nomes['Música']+$nomes['atitude'];
                            @$mu2= $nome['Música']+$nome['atitude'];
                            @$mu3= $nom['Música']+$nom['atitude'];
                            
                          $html .="<td>".$mu1."</td>";
                           $html .="<td>".$mu2."</td>";
                           $html .="<td>".$mu3."</td>";
                         $mus=(($mu1*1)+($mu2*2)+($mu3*3))/6;
                           $html .="<td>".number_format($mus,2)."</td>";
                           if ($mus>=50){$rm="APROVADO";} else {$rm="REPROVADO";}
                            $html .="<td>".$rm."</td>";

                       
                       @$total_faltas = $nomes['faltas_Artes'] + $nomes['faltas_Ciências'] + $nomes['faltas_Educação_Física'] + $nomes['faltas_Ensino_Religioso'] + $nomes['faltas_Ética'] + $nomes['faltas_Geografia'] + $nomes['faltas_História'] + $nomes['faltas_Inglês'] + $nomes['faltas_Matemática'] + $nomes['faltas_Música'] + $nomes['faltas_Português'];
                       $html .="<td>".$total_faltas."</td>";
                      
            $html .= '</tr>';
             }
            $html .= '</table>';
                 
        // ConfiguraÃ§Ãµes header para forÃ§ar o download
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header("Content-Description: PHP Generated Data");
        // Envia o conteÃºdo do arquivo
        echo $html;
        exit;
       include 'rodape.php';
       ?>
    </body>
</html>