<link href="../../../media/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="../../../media/fullcalendar/fullcalendar.print.min.css" rel="stylesheet" type="text/css" media='print' />
<link href='../../../media/fullcalendar/lib/cupertino/jquery-ui.min.css'  rel='stylesheet'/>

<script src='../../../media/fullcalendar/lib/moment.min.js'></script>
<script src="../../../media/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

<div class="col-md-9">
    <div class="box box-primary">                                
        <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id='calendar'></div>
        </div>
    </div>
</div>

<?
require_once('action.php'); 
$data = $model->selectSchedulingAll();
$dataSch='';
foreach ($data as $key => $value) {
    if($key>0) { $dataSch.=","; }
    $dataSch.="{
        title: '".$value->full_name."',
        start: '".date('Y-m-d', strtotime($value->date))."T".date('h:i', strtotime($value->hour)).":00',
        }
    ";
}
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            theme: true,
            allDay: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            ignoreTimezone: false,
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            axisFormat: 'H:mm',
            buttonText: {
                today: "Hoje",
                month: "Mês",
                week: "Semana",
                day: "Dia"
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [<?=json_decode(json_encode($dataSch))?>],
            timeFormat: 'H(:mm)t'
        });
    });
</script>