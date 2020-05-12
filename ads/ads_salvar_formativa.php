<?php
//SALVA A AVALIAÇÃO FORMATIVA E OS PARECERES INDIVIDUAIS
include '../functions/valida_sessao_ads.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PLANILHA DE NOTAS</title>
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
        $nome_aluno = $_POST['nome_aluno'];
        $turmas_id = $_POST['turma'];
        $aluno_id = $_POST['aluno_id'];
        $ano_letivo = $_POST['ano_letivo'];
        $trimestre = $_POST['trimestre'];
        if (is_array($_POST['atitude'])) {
            $atitude = $_POST['atitude'];
        } else {
            $atitude = 0;
        }
        $trimestre = $_POST['trimestre'];
        $descritivo = $_POST['descritivo'];
       
        $ano_letivo = $_POST['ano_letivo'];
       
        $atrasos = $_POST['atrasos'];
        $bilhetes = $_POST['bilhetes'];
        $agenda = $_POST['agenda'];
        $atrasos_biblioteca = $_POST['atrasos_biblioteca'];
        $multas_biblioteca = $_POST['multas_biblioteca'];
        $deve_livro= $_POST['deve_livro'];
        $bilhetes_biblioteca = $_POST['bilhetes_biblioteca'];
        $faltas_pesquisa_biblioteca = $_POST['faltas_pesquisa_biblioteca'];
        $bilhete_informatica = $_POST['bilhete_informatica'];
        $falta_informatica = $_POST['falta_informatica'];
        $sites_improprios = $_POST['sites_improprios'];
        $roupa_inadequada = $_POST['roupa_inadequada'];
        $sem_uniforme_ef = $_POST['sem_uniforme_ef'];
        $dicionario_portugues = $_POST['dicionario_portugues'];
        $dicionário_ingles = $_POST['dicionario_ingles'];
        $tema_portugues = $_POST['tema_portugues'];
        $tema_matematica = $_POST['tema_matematica'];
        $tema_ciencias = $_POST['tema_ciencias'];
        $tema_geografia = $_POST['tema_geografia'];
        $tema_historia = $_POST['tema_historia'];
        $tema_artes = $_POST['tema_artes'];
        $tema_ingles = $_POST['tema_ingles'];
        $tema_ef = $_POST['tema_ef'];
        $tema_er = $_POST['tema_er'];
        $tema_etica = $_POST['tema_etica'];
        $tema_musica = $_POST['tema_musica'];
        $trabalho_portugues = $_POST['trabalho_portugues'];
        $trabalho_matematica= $_POST['trabalho_matematica'];
        $trabalho_ciencias = $_POST['trabalho_ciencias'];
        $trabalho_geografia = $_POST['trabalho_geografia'];
        $trabalho_historia = $_POST['trabalho_historia'];
        $trabalho_artes = $_POST['trabalho_artes'];
        $trabalho_ingles = $_POST['trabalho_ingles'];
        $trabalho_ef = $_POST['trabalho_ef'];
        $trabalho_er = $_POST['trabalho_er'];
        $trabalho_etica = $_POST['trabalho_etica'];
        $trabalho_musica = $_POST['trabalho_musica'];
        $material_portugues = $_POST['material_portugues'];
        $material_matematica = $_POST['material_matematica'];
        $material_ciencias = $_POST['material_ciencias'];
        $material_geografia = $_POST['material_geografia'];
        $material_historia = $_POST['material_historia'];
        $material_artes = $_POST['material_artes'];
        $material_ingles = $_POST['material_ingles'];
        $material_ef = $_POST['material_ef'];
        $material_er = $_POST['material_er'];
        $material_etica = $_POST['material_etica'];
        $material_musica = $_POST['material_musica'];
        
        foreach (array($aluno_id) as $aluno_id) {
            foreach (array($atitude) as $atitude) {
                foreach (array($descritivo) as $descritivo) {
                 foreach (array($atrasos) as $atrasos ) {
                  foreach (array($bilhetes) as $bilhetes ) {    
                    foreach (array($agenda) as $agenda ) {  
                      foreach (array($atrasos_biblioteca) as $atrasos_biblioteca ) {
                      foreach (array($multas_biblioteca) as $multas_biblioteca ) {
                      foreach (array($deve_livro) as $deve_livro ) {
                      foreach (array($bilhetes_biblioteca) as $bilhetes_biblioteca ) {
                      foreach (array($faltas_pesquisa_biblioteca) as $faltas_pesquisa_biblioteca ) {
                      foreach (array($bilhete_informatica) as $bilhete_informática ) {
                      foreach (array($falta_informatica) as $falta_informatica ) {    
                      foreach (array($sites_improprios) as $sites_improprios ) {    
                      foreach (array($roupa_inadequada) as $roupa_inadequada ) {    
                      foreach (array($sem_uniforme_ef) as $sem_uniforme_ef ) {    
                      foreach (array($dicionario_portugues) as $dicionario_portugues ) {    
                       foreach (array($dicionário_ingles) as $dicionário_ingles ) {
                       foreach (array($tema_portugues) as $tema_portugues ) {    
                       foreach (array($tema_matematica) as $tema_matematica ) {    
                       foreach (array($tema_ciencias) as $tema_ciencias ) {    
                       foreach (array($tema_geografia) as $tema_geografia ) {    
                       foreach (array($tema_historia) as $tema_historia ) {    
                       foreach (array($tema_artes) as $tema_artes ) {    
                       foreach (array($tema_ingles) as $tema_ingles ) {    
                       foreach (array($tema_ef) as $tema_ef ) {    
                       foreach (array($tema_er) as $tema_er ) {    
                       foreach (array($tema_etica) as $tema_etica ) {    
                       foreach (array($tema_musica) as $tema_musica ) { 
                       foreach (array($trabalho_portugues) as $trabalho_portugues ) {    
                       foreach (array($trabalho_matematica) as $trabalho_matematica ) {    
                       foreach (array($trabalho_ciências) as $trabalho_ciências ) {    
                       foreach (array($trabalho_geografia) as $trabalho_geografia ) {    
                       foreach (array($trabalho_historia) as $trabalho_historia ) {    
                       foreach (array($trabalho_artes) as $trabalho_artes ) {    
                       foreach (array($trabalho_ingles) as $trabalho_ingles ) {    
                       foreach (array($trabalho_ef) as $trabalho_ef ) {    
                       foreach (array($trabalho_er) as $trabalho_er ) {    
                       foreach (array($trabalho_etica) as $trabalho_etica ) {    
                       foreach (array($trabalho_musica) as $trabalho_musica ) { 
                       foreach (array($material_portugues) as $material_portugues ) {    
                       foreach (array($material_matematica) as $material_matematica ) {    
                       foreach (array($material_ciências) as $material_ciências ) {    
                       foreach (array($material_geografia) as $material_geografia ) {    
                       foreach (array($material_historia) as $material_historia ) {    
                       foreach (array($material_artes) as $material_artes ) {    
                       foreach (array($material_ingles) as $material_ingles ) {    
                       foreach (array($material_ef) as $material_ef ) {    
                       foreach (array($material_er) as $material_er ) {    
                       foreach (array($material_etica) as $material_etica ) {    
                       foreach (array($material_musica) as $material_musica ) { 
                                              
                            for ($i = 0; $i < count($nome_aluno); $i++) {
                            
                            
                            @$cadastro = $con->query("UPDATE medias SET atitude = '$atitude[$i]', descritivo='$descritivo[$i]', atrasos = '$atrasos[$i]', bilhetes = '$bilhetes[$i]', agenda = '$agenda[$i]', atrasos_biblioteca = '$atrasos_biblioteca[$i]', multas_biblioteca = '$multas_biblioteca[$i]', deve_livro = '$deve_livro[$i]', bilhetes_biblioteca = '$bilhetes_biblioteca[$i]',
                                    faltas_pesquisa_biblioteca = '$faltas_pesquisa_biblioteca[$i]', bilhete_informatica = '$bilhete_informatica[$i]', falta_informatica = '$falta_informatica[$i]', sites_improprios = '$sites_improprios[$i]', roupa_inadequada = '$roupa_inadequada[$i]', sem_uniforme_ef = '$sem_uniforme_ef[$i]', dicionario_portugues = '$dicionario_portugues[$i]',
                                    dicionario_ingles = '$dicionário_ingles[$i]', tema_portugues = '$tema_portugues[$i]', tema_matematica = '$tema_matematica[$i]', tema_ciencias = '$tema_ciencias[$i]', tema_geografia = '$tema_geografia[$i]', tema_historia = '$tema_historia[$i]', tema_artes = '$tema_artes[$i]', tema_ingles = '$tema_ingles[$i]', tema_ef = '$tema_ef[$i]', tema_er = '$tema_er[$i]',
                                    tema_etica = '$tema_etica[$i]', tema_musica = '$tema_musica[$i]', trabalho_portugues = '$trabalho_portugues[$i]', trabalho_matematica = '$trabalho_matematica[$i]', trabalho_ciencias = '$trabalho_ciencias[$i]', trabalho_geografia = '$trabalho_geografia[$i]', trabalho_historia = '$trabalho_historia[$i]', trabalho_artes = '$trabalho_artes[$i]', trabalho_ingles = '$trabalho_ingles[$i]',
                                    trabalho_ef = '$trabalho_ef[$i]', trabalho_er = '$trabalho_er[$i]', trabalho_etica = '$trabalho_etica[$i]', trabalho_musica = '$trabalho_musica[$i]', material_portugues = '$material_portugues[$i]', material_matematica = '$material_matematica[$i]', material_ciencias = '$material_ciencias[$i]', material_geografia = '$material_geografia[$i]', material_historia = '$material_historia[$i]',
                                    material_artes = '$material_artes[$i]', material_ingles = '$material_ingles[$i]', material_ef = '$material_ef[$i]', material_er = '$material_er[$i]', material_etica = '$material_etica[$i]', material_musica = '$material_musica[$i]' WHERE aluno_id = $aluno_id[$i] AND trimestre_id=$trimestre AND ano_letivo_id=$ano_letivo");

                            header("Location: ads_consultar_formativa.php");
                        }
        }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
                      