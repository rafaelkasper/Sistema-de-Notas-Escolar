<?php 
//FUNÇÃO PARA EXIBIR APENAS AS DISCIPLINAS LECIONADAS POR DETERMINADO PROFESSOR

include_once("conecta_banco.php");
                
	$professor_id = $_REQUEST['professor_id'];
	
	$result_sub_cat = "SELECT * FROM disciplinas WHERE professor_id=$professor_id ORDER BY nome_disciplina";
	$resultado_sub_cat = mysqli_query($con, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$disciplinas[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_disciplina' => $row_sub_cat['nome_disciplina'],
		);
	}
        
	echo(json_encode($disciplinas));
