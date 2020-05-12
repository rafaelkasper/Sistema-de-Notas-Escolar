<?php
//GERA UM ARQUIVO XLS COM A FORMATIVA DAS TURMAS
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
        <title>PLANILHA FORMATIVA</title>
    <head>
    <body class="bg-light">
        <?php
        // NOME DO ARQUIVO QUE SERÁ BAIXADO
        $arquivo = 'formativa.xls';

        // CRIA A TABELA NO FORMATO DO EXCEL
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<th colspan="4">Planilha de Médias</th>';
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td><b>NOME</b></td>';
        $html .= '<td><b>ATITUDE</b></td>';
        $html .= '<td><b>PORTUGUÊS</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>MATEMÁTICA</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>GEOGRAFIA</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>HISTÓRIA</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>CIÊNCIAS</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>E. FÍSICA</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>ARTES</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>E. RELIGIOSO</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>INGLÊS</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>ÉTICA</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>MÚSICA</b></td>';
        $html .= '<td><b>FALTAS</b></td>';
        $html .= '<td><b>TOTAL FALTAS</b></td>';
                                 $html .= '<td><b>ATRASOS</b></td>';
                         $html .= '<td><b>BILHETES</b></td>';
                        $html .= '<td><b>AGENDA</b></td>';
                         $html .= '<td><b>ATRASOS BIBLIOTECA</b></td>';
                         $html .= '<td><b>MULTA BIBLIOTECA</b></td>';
                         $html .= '<td><b>BILHETE BIBLIOTECA</b></td>';
                          $html .= '<td><b>DEVE LIVRO</b></td>';
                         $html .= '<td><b>FALTA PESQUISA BIBLIOTECA</b></td>';
                      $html .= '<td><b>BILHETE ASSINADO INFORMÁTICA</b></td>';
                       $html .= '<td><b> FALTA PESQUISA INFORMÁTICA</b></td>';
                        $html .= '<td><b>SITES IMPRÓPRIOS</b></td>';
                        $html .= '<td><b>ROUPA INADEQUADA</b></td>';
                         $html .= '<td><b>SEM UNIFORME EF</b></td>';
                        $html .= '<td><b>SEM DICIONÁRIO PORTUGUÊS</b></td>';
                        $html .= '<td><b>SEM DICIONÁRIO DE INGLÊS</b></td>';
                        $html .= '<td><b>TEMA PORTUGUÊS</b></td>';
                       $html .= '<td><b>TEMA MATEMÁTICA</b></td>';
                      $html .= '<td><b>TEMA CIÊNCIAS</b></td>';
                        $html .= '<td><b>TEMA GEOGRAFIA</b></td>';
                       $html .= '<td><b>TEMA HISTÓRIA</b></td>';
                       $html .= '<td><b>TEMA ARTES</b></td>';
                       $html .= '<td><b>TEMA INGLÊS</b></td>';
                       $html .= '<td><b>TEMA EDUCAÇÃO FÍSICA</b></td>';
                        $html .= '<td><b>TEMA ENSINO RELIGIOSO</b></td>';
                         $html .= '<td><b>TEMA ÉTICA</b></td>';
                        $html .= '<td><b>TEMA MÚSICA</b></td>';
                        $html .= '<td><b>TRABALHO PORTUGUÊS</b></td>';
                       $html .= '<td><b>TRABALHO MATEMÁTICA</b></td>';
                         $html .= '<td><b>TRABALHO CIÊNCIAS</b></td>';
                         $html .= '<td><b>TRABALHO GEOGRAFIA</b></td>';
                         $html .= '<td><b>TRABALHO HISTÓRIA</b></td>';
                         $html .= '<td><b>TRABALHO ARTES</b></td>';
                         $html .= '<td><b>TRABALHO INGLÊS</b></td>';
                         $html .= '<td><b>TRABALHO EDUCAÇÃO FÍSICA</b></td>';
                         $html .= '<td><b>TRABALHO ENSINO RELIGIOSO</b></td>';
                         $html .= '<td><b>TRABALHO ÉTICA</b></td>';
                         $html .= '<td><b>TRABALHO MÚSICA</b></td>';
                         $html .= '<td><b>MATERIAL PORTUGUÊS</b></td>';
                         $html .= '<td><b>MATERIAL MATEMÁTICA</b></td>';
                         $html .= '<td><b>MATERIAL CIÊNCIAS</b></td>';
                         $html .= '<td><b>MATERIAL GEOGRAFIA</b></td>';
                        $html .= '<td><b>MATERIAL HISTÓRIA</b></td>';
                         $html .= '<td><b>MATERIAL ARTES</b></td>';
                         $html .= '<td><b>MATERIAL INGLÊS</b></td>';
                        $html .= '<td><b>MATERIAL EDUCAÇÃO FÍSICA</b></td>';
                         $html .= '<td><b>MATERIAL ENSINO RELIGIOSO</b></td>';
                         $html .= '<td><b>MATERIAL ÉTICA</b></td>';
                         $html .= '<td><b>MATERIAL MÚSICA</b></td>';
                      
                         $html .= '<td><b>DESCRITIVO</b></td>';
        $html .= '</tr>';

       

        $consultar = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = $trimestre AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                      while ($nomes = $consultar->fetch_array()) {
            @$tartes = ($nomes['Artes']) + ($nomes['atitude']);
            @$tciencias = ($nomes['Ciências']) + ($nomes['atitude']);
            @$tef = ($nomes['Educação_Física']) + ($nomes['atitude']);
            @$ter = ($nomes['Ensino_Religioso']) + ($nomes['atitude']);
            @$tetica = ($nomes['Ética']) + ($nomes['atitude']);
            @$tgeografia = ($nomes['Geografia']) + ($nomes['atitude']);
            @$thistoria = ($nomes['História']) + ($nomes['atitude']);
            @$tmatematica = ($nomes['Matemática']) + ($nomes['atitude']);
            @$tmusica = ($nomes['Música']) + ($nomes['atitude']);
            @$tportugues = ($nomes['Português']) + ($nomes['atitude']);
            @$tingles = ($nomes['Inglês']) + ($nomes['atitude']);
            @$total_faltas = $nomes['faltas_Artes'] + $nomes['faltas_Ciências'] + $nomes['faltas_Educação_Física'] + $nomes['faltas_Ensino_Religioso'] + $nomes['faltas_Ética'] + $nomes['faltas_Geografia'] + $nomes['faltas_História'] + $nomes['faltas_Inglês'] + $nomes['faltas_Matemática'] + $nomes['faltas_Música'] + $nomes['faltas_Português'];

            $html .= '<tr>';
            $html .= "<td>" . $nomes['nome_aluno'] . "</td>";
            $html .= '<td>' . $nomes['atitude'] . '</td>';

            $html .= "<td>" . $tportugues . "</td>";
            $html .= "<td>" . $nomes['faltas_Português'] . "</td>";
            $html .= "<td>" . $tmatematica . "</td>";
            $html .= "<td>" . $nomes['faltas_Matemática'] . "</td>";
            $html .= "<td>" . $tgeografia . "</td>";
            $html .= "<td>" . $nomes['faltas_Geografia'] . "</td>";
            $html .= "<td>" . $thistoria . "</td>";
            $html .= "<td>" . $nomes['faltas_História'] . "</td>";
            $html .= "<td>" . $tciencias . "</td>";
            $html .= "<td>" . $nomes['faltas_Ciências'] . "</td>";
            $html .= "<td>" . $tef . "</td>";
            $html .= "<td>" . $nomes['faltas_Educação_Física'] . "</td>";
            $html .= "<td>" . $tartes . "</td>";
            $html .= "<td>" . $nomes['faltas_Artes'] . "</td>";
            $html .= "<td>" . $ter . "</td>";
            $html .= "<td>" . $nomes['faltas_Ensino_Religioso'] . "</td>";
            $html .= "<td>" . $tingles . "</td>";
            $html .= "<td>" . $nomes['faltas_Inglês'] . "</td>";
            $html .= "<td>" . $tetica . "</td>";
            $html .= "<td>" . $nomes['faltas_Ética'] . "</td>";
            $html .= "<td>" . $tmusica . "</td>";
            $html .= "<td>" . $nomes['faltas_Música'] . "</td>";
            $html .= "<td>" . $total_faltas . "</td>";
           $html .= "<td>" . $nomes['atrasos']. "</td>";
                         $html .= "<td>" .$nomes['bilhetes']. "</td>";
                          $html .= "<td>" . $nomes['agenda']. "</td>";
                                $html .= "<td>" . $nomes['atrasos_biblioteca']. "</td>";
                                $html .= "<td>" .$nomes['multas_biblioteca'] . "</td>";
                             $html .= "<td>" .$nomes['bilhetes_biblioteca'] . "</td>";
                                $html .= "<td>" .$nomes['deve_livro'] . "</td>";
                                $html .= "<td>" .$nomes['faltas_pesquisa_biblioteca']. "</td>";
                               $html .= "<td>" .$nomes['bilhete_informatica']. "</td>";
                              $html .= "<td>" . $nomes['falta_informatica']. "</td>";
                               $html .= "<td>" .$nomes['sites_improprios'] . "</td>";
                                $html .= "<td>" .$nomes['roupa_inadequada'] . "</td>";
                                $html .= "<td>" .$nomes['sem_uniforme_ef'] . "</td>";
                               $html .= "<td>" .$nomes['dicionario_portugues']. "</td>";
                               $html .= "<td>" .$nomes['dicionario_ingles']. "</td>";
                                $html .= "<td>" .$nomes['tema_portugues']. "</td>";
                                $html .= "<td>" .$nomes['tema_matematica'] . "</td>";
                                $html .= "<td>" .$nomes['tema_ciencias'] . "</td>";
                               $html .= "<td>" .$nomes['tema_geografia']. "</td>";
                               $html .= "<td>" .$nomes['tema_historia'] . "</td>";
                                $html .= "<td>" .$nomes['tema_artes'] . "</td>";
                                $html .= "<td>" .$nomes['tema_ingles'] . "</td>";
                               $html .= "<td>" .$nomes['tema_ef'] . "</td>";
                                $html .= "<td>" .$nomes['tema_er'] . "</td>";
                                $html .= "<td>" .$nomes['tema_etica'] . "</td>";
                               $html .= "<td>" .$nomes['tema_musica']. "</td>";
                                $html .= "<td>" .$nomes['trabalho_portugues'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_matematica'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_ciencias']. "</td>";
                                $html .= "<td>" .$nomes['trabalho_geografia'] . "</td>";
                               $html .= "<td>" .$nomes['trabalho_historia'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_artes'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_ingles'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_ef'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_er'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_etica'] . "</td>";
                                $html .= "<td>" .$nomes['trabalho_musica'] . "</td>";
                                $html .= "<td>" .$nomes['material_portugues'] . "</td>";
                               $html .= "<td>" .$nomes['material_matematica']. "</td>";
                                $html .= "<td>" .$nomes['material_ciencias'] . "</td>";
                                $html .= "<td>" .$nomes['material_geografia'] . "</td>";
                                $html .= "<td>" .$nomes['material_historia'] . "</td>";
                                $html .= "<td>" .$nomes['material_artes'] . "</td>";
                                $html .= "<td>" .$nomes['material_ingles'] . "</td>";
                                $html .= "<td>" .$nomes['material_ef'] . "</td>";
                                $html .= "<td>" .$nomes['material_er']. "</td>";
                                $html .= "<td>" .$nomes['material_etica']. "</td>";
                                $html .= "<td>" .$nomes['material_musica'] . "</td>";
                                
            
            
            
            
            
            $html .= "<td>" . $nomes['descritivo'] . "</td>";
        }



        $html .= '</tr>';
        ;
        // }
        // CONFIGURAÇÃO PARA FORÇAR O DOWNLOAD
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header("Content-Description: PHP Generated Data");
        
        echo $html;
        exit;
        ?>
        <?php include 'rodape.php'; ?>
    </body>
</html>