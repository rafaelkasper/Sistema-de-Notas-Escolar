<?php
//VERIFICA AS CREDENCIAIS DE ACESSO E AUTORIZA O ACESSO
$acesso = $_POST["acesso"];
$senha = $_POST["senha"];
// acesso ao banco de dados
include "conecta_banco.php";
$acesso = $con->real_escape_string($acesso);
$senha = $con->real_escape_string($senha);

if((!empty($acesso)) AND (!empty($senha))) {
    $consulta = $con->query("SELECT * FROM acesso WHERE login='$acesso' AND status='1' limit 1");
    $linhas = $consulta->num_rows;
    $row = $consulta->fetch_array();
    $ads_id = $row ['ads_id'];
    $professores_id = $row['professores_id'];
    $alunos_id = $row['alunos_id'];
    $equipe_id = $row['equipe_id'];
    $func_id = $row['func_id'];
    $niveis_acesso_id = $row['niveis_acesso_id'];
    if(password_verify($senha, $row['senha'])){
    
    
        if ($row["niveis_acesso_id"] == 1) {
            session_start();
            $_SESSION['login'] = $acesso;
            $_SESSION['senha'] = $senha;
            $_SESSION['ads_id'] = $ads_id;
            $_SESSION['niveis_acesso_id'] = $niveis_acesso_id;
            header("Location: ../ads/ads_index.php");
        } elseif ($row["niveis_acesso_id"] == 2) {
            session_start();
            $_SESSION['login'] = $acesso;
            $_SESSION['senha'] = $senha;
            $_SESSION['professores_id'] = $professores_id;
            $_SESSION['niveis_acesso_id'] = $niveis_acesso_id;
            header("Location: ../professor/professor_index.php");
            
        } elseif ($row["niveis_acesso_id"] == 3) {
            session_start();
            $_SESSION['login'] = $acesso;
            $_SESSION['senha'] = $senha;
            $_SESSION['alunos_id'] = $alunos_id;
            $_SESSION['niveis_acesso_id'] = $niveis_acesso_id;
            header("Location: ../aluno/aluno_index.php");
        } elseif ($row["niveis_acesso_id"] == 4) {
            session_start();
            $_SESSION['login'] = $acesso;
            $_SESSION['senha'] = $senha;
            $_SESSION['equipe_id'] = $equipe_id;
            $_SESSION['niveis_acesso_id'] = $niveis_acesso_id;
            header("Location: ../equipe/equipe_index.php");
        }
        elseif ($row["niveis_acesso_id"] == 5) {
            session_start();
            $_SESSION['login'] = $acesso;
            $_SESSION['senha'] = $senha;
            $_SESSION['func_id'] = $func_id;
            $_SESSION['niveis_acesso_id'] = $niveis_acesso_id;
            header("Location: ../func/func_index.php");
        }
}
    
   else  {
        echo "<html><body>";
       
        include "erro_login.php";
        echo "</body></html>";
}}


$con = null;
?>