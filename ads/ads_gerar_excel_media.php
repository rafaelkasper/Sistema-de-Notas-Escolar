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
    <head>
    <body class="bg-light">
        <?php
        // Definimos o nome do arquivo que serÃ¡ exportado
        $arquivo = 'medias.xls';

        // Criamos uma tabela HTML com o formato da planilha
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<th colspan="4">Planilha de Médias</th>';
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td><b>NOME</b></td>';
        $html .= '<td><b>ATITUDE</b></td>';
         $html .=  '<td><b>PORTUGUÊS</b></td>';
          $html .=  '<td><b>FALTAS</b></td>';
         $html .=  '<td><b>MATEMÁTICA</b></td>';
          $html .=  '<td><b>FALTAS</b></td>';
          $html .=  '<td><b>GEOGRAFIA</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
          $html .= '<td><b>HISTÓRIA</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
          $html .=  '<td><b>CIÊNCIAS</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
           $html .=   '<td><b>E. FÍSICA</b></td>';
            $html .=  '<td><b>FALTAS</b></td>';
          $html .= '<td><b>ARTES</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
          $html .= '<td><b>E. RELIGIOSO</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
          $html .= '<td><b>INGLÊS</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
          $html .=  '<td><b>ÉTICA</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
          $html .=  '<td><b>MÚSICA</b></td>';
           $html .=  '<td><b>FALTAS</b></td>';
          $html .=  '<td><b>TOTAL FALTAS</b></td>';
        //$consult = $con->query("SELECT nome_disciplina FROM disciplinas join notas on disciplinas.id=notas.disciplina_id where notas.turmas_id = $turma AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo GROUP BY disciplinas.nome_disciplina");

                        //for ($i = 0; $i < count($consult); $i++) {
                           // while ($materia = $consult->fetch_array()) {
                           //     $html .= "<td>"."<b>". $materia[$i] . "<b>"."</td>";
                          //  }
                      //  }
        $html .= '<td><b>DESCRITIVO</b></td>';
        $html .= '</tr>';

        //Selecionar todos os itens da tabela 
        //$consultar = $con->query("SELECT * FROM alunos join notas on alunos.id=notas.aluno_id join medias on alunos.id = medias.aluno_id WHERE notas.turmas_id = $turma AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo GROUP BY nome_aluno");

       // while ($row = $consultar->fetch_array()) {
          //  $html .= '<tr>';
           // $html .= '<td>' . $row["nome_aluno"] . '</td>';
          //  $html .= '<td>' . '</td>';
           //  $consult = $con->query("SELECT * FROM disciplinas join notas on disciplinas.id=notas.disciplina_id WHERE notas.turmas_id = $turma AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo GROUP BY disciplinas.nome_disciplina");
                    //    while ($row = $consult->fetch_row() ) { 
                      //      $disciplina_id = $row[0];
                        //    $materias[] = $row[1];
                             
                       //  foreach($materias as $materia){  
                      //   $result = $con->query("SELECT $materia FROM medias join notas on medias.aluno_id = notas.aluno_id join turmas on notas.turmas_id = turmas.id JOIN alunos on medias.aluno_id=alunos.id WHERE notas.turmas_id = $turma AND notas.disciplina_id = $disciplina_id AND notas.trimestre_id = $trimestre AND notas.ano_letivo_id = $ano_letivo order by nome_aluno ASC");
                       //  $mat = $result->fetch_row();
                       //  $m = $mat[0];
                       //  $num_colunas = $result->field_count;
                         //var_dump($num_colunas);
                        // for($i = 0; $i <$num_colunas; $i++){
                             
                       // $html .= "<td>". "$m"."</td>";
                              
                       //  }
                       // } }
            
             $consultar = $con->query("SELECT * FROM alunos join medias on alunos.id = medias.aluno_id WHERE medias.turma_id = $turma AND medias.trimestre_id = $trimestre AND medias.ano_letivo_id = $ano_letivo GROUP BY CAST(alunos.chamada AS unsigned)");
                               while ($nomes = $consultar->fetch_array()) {
                        @$tartes = ($nomes['Artes'])+($nomes['atitude']);
                            @$tciencias  = ($nomes['Ciências'])+($nomes['atitude']);
                            @$tef  = ($nomes['Educação_Física'])+($nomes['atitude']);
                            @$ter  = ($nomes['Ensino_Religioso'])+($nomes['atitude']);
                            @$tetica  = ($nomes['Ética'])+($nomes['atitude']);
                            @$tgeografia  = ($nomes['Geografia'])+($nomes['atitude']);
                            @$thistoria = ($nomes['História'])+($nomes['atitude']);
                            @$tmatematica = ($nomes['Matemática'])+($nomes['atitude']);
                            @$tmusica= ($nomes['Música'])+($nomes['atitude']);
                            @$tportugues  = ($nomes['Português'])+($nomes['atitude']);
                            @$tingles = ($nomes['Inglês'])+($nomes['atitude']);
                            @$total_faltas = $nomes['faltas_Artes'] + $nomes['faltas_Ciências'] + $nomes['faltas_Educação_Física'] + $nomes['faltas_Ensino_Religioso'] + $nomes['faltas_Ética'] + $nomes['faltas_Geografia'] + $nomes['faltas_História'] + $nomes['faltas_Inglês'] + $nomes['faltas_Matemática'] + $nomes['faltas_Música'] + $nomes['faltas_Português'];
                       
                            $html .= '<tr>';
                            $html .= "<td>" . $nomes['nome_aluno'] . "</td>";
                             $html .= '<td>' .$nomes['atitude']. '</td>';
                             
                             $html .=  "<td>" .$tportugues. "</td>";
                             $html .=  "<td>" .$nomes['faltas_Português']. "</td>";
                              $html .=  "<td>" .$tmatematica . "</td>";
                               $html .=  "<td>" .$nomes['faltas_Matemática']. "</td>";
                              $html .=  "<td>" .$tgeografia . "</td>";
                               $html .=  "<td>" .$nomes['faltas_Geografia']. "</td>";
                              $html .= "<td>" . $thistoria . "</td>";
                               $html .=  "<td>" .$nomes['faltas_História']. "</td>";
                              $html .= "<td>" . $tciencias . "</td>";
                               $html .=  "<td>" .$nomes['faltas_Ciências']. "</td>";
                              $html .= "<td>" . $tef  . "</td>";
                               $html .=  "<td>" .$nomes['faltas_Educação_Física']. "</td>";
                              $html .= "<td>" . $tartes . "</td>";
                               $html .=  "<td>" .$nomes['faltas_Artes']. "</td>";
                             $html .=  "<td>" . $ter . "</td>";
                              $html .=  "<td>" .$nomes['faltas_Ensino_Religioso']. "</td>";
                             $html .= "<td>" . $tingles . "</td>";
                              $html .=  "<td>" .$nomes['faltas_Inglês']. "</td>";
                            $html .= "<td>" . $tetica . "</td>";
                             $html .=  "<td>" .$nomes['faltas_Ética']. "</td>";
                            $html .= "<td>" .  $tmusica . "</td>";
                             $html .=  "<td>" .$nomes['faltas_Música']. "</td>";
                             $html .= "<td>" .  $total_faltas . "</td>";
                        $html .= "<td>" .$nomes['descritivo']. "</td>";
                        }
            
            
           
            $html .= '</tr>';
            ;
       // }
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
        ?>
        <?php include 'rodape.php';?>
    </body>
</html>