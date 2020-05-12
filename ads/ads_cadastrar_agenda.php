<?php
include"../functions/conecta_banco.php";


$resultado_events = $con->query("SELECT id, title, color, start, end FROM events");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8' />
        <link href='../css/fullcalendar.min.css' rel='stylesheet' />
        <link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <link href='../css/personalizado.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src='../js/moment.min.js'></script>
        <script src='../js/jquery.min.js'></script>
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
    </head>
    <body class="bg-light">
        <div class="container">
            <?php
            include '../functions/data_include.php';
            ?>
            <div id='calendar'></div>
        </div>
        <?php include '../functions/rodape.php'; ?>
    </body>
</html>
