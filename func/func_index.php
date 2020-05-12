<?php
include '../functions/valida_sessao_func.php';
include "../functions/conecta_banco.php";

$resultado_events = $con->query("SELECT id, title, color, start, end FROM events");
$row = mysqli_fetch_array($resultado_events);
$id = $row ['id'];
$recado = $con -> query("SELECT mensagem FROM mensagens WHERE func_id = $func_id");
$rec = $recado->fetch_row();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8'/>
        <title>INÍCIO</title>
        <link rel="icon" type="image/png" href="../images/favicon.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href='../css/bootstrap.min.css' rel='stylesheet'>
        <link href='../css/fullcalendar.min.css' rel='stylesheet' />
        <link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <link href='../css/personalizado.css' rel='stylesheet' />

        <script src='../js/jquery.min.js'></script>
        <script src='../js/bootstrap.min.js'></script>
        <script src='../js/moment.min.js'></script>
        <script src='../js/fullcalendar.min.js'></script>
        <script src='../locale/pt-br.js'></script>
        <script>
            $(document).ready(function () {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: Date(),
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
<?php
while ($row_events = mysqli_fetch_array($resultado_events)) {
    ?>
                            {
                                id: '<?php echo $row_events['id']; ?>',
                                title: '<?php echo $row_events['title']; ?>',
                                start: '<?php echo $row_events['start']; ?>',
                                end: '<?php echo $row_events['end']; ?>',
                                color: '<?php echo $row_events['color']; ?>',
                            },<?php
}
?>
                    ]
                });
            });
        </script>
        <script> $(".alert").alert()</script>
    </head>
    <header>
        <?php
        include 'menu_func.php';
        //var_dump($rec);
        ?>

    </header>
    <body class="bg-light">
        <div class="container">
             <?php
             echo '<br>';
              echo '<br>';
              echo '<br>';
            include '../functions/data_include.php';
            echo '<br>';
             
              if(isset($rec[0])){
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>".$rec[0]."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
             $deletar = $con ->query("DELETE FROM mensagens WHERE func_id = $func_id");
              }
            ?>
            <br>
        <br>
        
        <div class="w-50 p-3" id='calendar'></div>
        </div>
        <?php include '../functions/rodape.php';?>
    </body>
</html>
