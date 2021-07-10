<?php
include_once '../Entity/jugementcalendar.php';
include_once '../Core/JugementCalendarC.php';
include_once '../Core/CotentieuxC.php';


if (!isset($_SESSION)) {
    session_start();
}

include_once "../Core/sessionC.php";
$session=new sessionC();
$liste=$session->AllSession();

$jdgServ=new JugementCalendarC();
if($_SESSION['role']=='Agent'){
    $zero=$jdgServ->cnte(0,$_SESSION['idAvocat']);
    $un=$jdgServ->cnte(1,$_SESSION['idAvocat']);
    $deux=$jdgServ->cnte(2,$_SESSION['idAvocat']);
    $myliste=$jdgServ->Alljugementcalendar($_SESSION['idAvocat']);
}else{
    $zero=$jdgServ->cnte(0,$_SESSION['id']);
    $un=$jdgServ->cnte(1,$_SESSION['id']);
    $deux=$jdgServ->cnte(2,$_SESSION['id']);
    $myliste=$jdgServ->Alljugementcalendar($_SESSION['id']);
}

$listeCotentieux=(new CotentieuxC())->afficherAllContentieux();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Smart Lawyer</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../Elements/stylesheets.php'; ?>
    <link rel="stylesheet" href="../plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar-bootstrap/main.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


    <!-- Main Sidebar Container -->
    <?php include '../Elements/navbar.php'; ?>
    <?php include '../Elements/header.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>المفكرة</h1>


                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../index.php"> لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المذكرة</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> عرض المهام:</h4>
                                </div>
                                <div class="card-body">
                                    <!-- the events -->
                                    <span id="information" role="alert">

                                    </span>
                                    <div id="external-events" hidden>
                                        <?php
                                        if(!empty($liste)){
                                        foreach ($liste as $x) {?>

                                        <div class="external-event" style="background-color: <?php echo $x['color']; ?>;color: white;"><?php echo $x['nom']; ?></div>
                                      <?php  }
}?>
                                        <div class="checkbox" >
                                            <label for="drop-remove">
                                                <input type="checkbox" id="drop-remove">
                                                remove after drop
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header" hidden>
                                    <h3 class="card-title">Create Event</h3>
                                </div>
                                <div class="card-body" hidden>
                                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                        <ul class="fc-color-picker" id="color-chooser">
                                            <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                            <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>

                                        </ul>
                                    </div>
                                    <!-- /btn-group -->
                                    <div class="input-group">
                                        <input id="new-event" type="text" class="form-control" placeholder="Title ... ">

                                        <div class="input-group-append">
                                            <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                        </div>
                                        <!-- /btn-group -->
                                    </div>
                                    <!-- /input-group -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-9">
                        <span style="font-weight: bold;font-size: 25px;">&bull;الجلسات(<?php echo $zero[0]; ?>)</span>&nbsp;&nbsp;
                        <span style="font-weight: bold;font-size: 25px;">&bull;الإجراءات(<?php echo $un[0]; ?>)</span>&nbsp;&nbsp;
                        <span style="font-weight: bold;font-size: 25px;">&bull;المواعيد(<?php echo $deux[0]; ?>)</span>

                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include '../Elements/footer.php'; ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->

    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include '../Elements/scripts.php'; ?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">الجلسات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body align-middle">

                <form action="add_Cal.php" id="Frm" method="post" style="width:60%;margin-left: 20%; " class="align-center">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">عنوان التذكير</label>
                        <input type="text" class="form-control" name="titre" placeholder="titre Rappel">
                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">التاريخ</label>
                        <input type="date" class="form-control" id="dateAdd" name="dateAdd" placeholder="Addresse">
                    </div>   <div class="form-group">
                        <label for="exampleFormControlInput1">لون التذكير</label>
                        <input type="color" class="form-control" id="favcolor" name="favcolor" value="#ff0000">
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">المعني بالأمر</label>
                        <select class="form-control" name="lacontentieu">
                            <?php
                            foreach ($listeCotentieux as $ky) {


                                ?>
                                <option value="<?php echo $ky['id']; ?>"><?php echo $ky['nom']; echo $ky['prenom']; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">الضد</label>
                        <input type="text" class="form-control" name="Adversaire" placeholder="Nom de l'adversaire">
                        <input type="hidden" class="form-control" name="tpe" value="0">
                    </div> <div class="form-group">
                        <label for="exampleFormControlInput1">المحكمة</label>
                        <input type="text" class="form-control" name="Tribue" placeholder="Tribunal">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('Frm').submit();">Ajouter Rappel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalmawaid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">المواعيد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body align-middle">
                <form action="add_Cal.php" id="Frm1" method="post" style="width:60%;margin-left: 20%; " class="align-center">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">عنوان التذكير</label>
                        <input type="text" class="form-control" name="titre" placeholder="titre Rappel">
                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">التاريخ</label>
                        <input type="date" class="form-control" id="dateAddthree" name="dateAdd" placeholder="Addresse">
                    </div>   <div class="form-group">
                        <label for="exampleFormControlInput1">لون التذكير</label>
                        <input type="color" class="form-control" id="favcolor" name="favcolor" value="#0000FF">
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">إسم الحريف</label>
                        <input type="text" class="form-control" name="nomclient" placeholder="Nom Client Pour le rendez-vous">
                        <input type="hidden" class="form-control" name="tpe" value="2">
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('Frm1').submit();">Ajouter Rappel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalmahem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">الإجراءات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body align-middle">

                <form action="add_Cal.php" id="Frm2" method="post" style="width:60%;margin-left: 20%; " class="align-center">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">عنوان التذكير</label>
                        <input type="text" class="form-control" name="titre" placeholder="titre Rappel">
                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">التاريخ</label>
                        <input type="date" class="form-control" id="dateAddtwo" name="dateAdd" placeholder="Addresse">
                    </div>   <div class="form-group">
                        <label for="exampleFormControlInput1">لون التذكير</label>
                        <input type="color" class="form-control" id="favcolor" name="favcolor" value="#008000">
                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">أكتب ماذا تريد</label>
                        <textarea class="form-control" name="personalise">
                        </textarea>
                        <input type="hidden" class="form-control" name="tpe" value="1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('Frm2').submit();">Ajouter Rappel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="choos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center">إختر وظيفة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body align-middle">

                <button type="button" class="btn btn-primary"  id="jls">الجلسات</button>
                <button type="button" class="btn btn-secondary" id="mhm">الإجراءات</button>
                <button type="button" class="btn btn-info" id="mwid" >المواعيد</button>
            </div>

        </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('#information').hide();
    });
</script>
<script src="../plugins/fullcalendar/main.min.js"></script>
<script src="../plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="../plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="../plugins/fullcalendar-interaction/main.min.js"></script>
<script src="../plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- Page specific script -->

<script>

    $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {

            ele.each(function () {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)
                // make the event draggable using jQuery UI
                $(this).draggable({

                    zIndex        : 1070,
                    revert        : true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                }

            )

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');
var TheFkTitle;
var TheFkcolor;
        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                TheFkTitle=eventEl.innerText;
                TheFkcolor=window.getComputedStyle( eventEl ,null).getPropertyValue('background-color');
                return {

                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
                };
            }
        });
        var tete=<?php echo json_encode($myliste) ?>;
        var events=[];


        for(let i=0;i<tete.length;i++){
            let obj={};
        obj.id=tete[i][0];
        obj.title=tete[i][1];
        obj.start=tete[i][2];

        date=new Date(tete[i][3]);
            obj.end=new Date(date.getFullYear(),date.getMonth(),date.getDate()+1);
        obj.allDay=tete[i][5];
        obj.backgroundColor=tete[i][4];
        obj.borderColor=tete[i][4];

           events.push(obj);

        }

          console.log(events)
        var calendar = new Calendar(calendarEl, {
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
            header    : {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            'themeSystem': 'bootstrap',
            //Random default events

            events    : events,
            editable  : true,
            droppable : true, // this allows things to be dropped onto the calendar !!!
            drop      : function(info) {
                //console.log(info);
            //    console.log( TheFkTitle);
              //  console.log( TheFkcolor);

                $.ajax({
                    type: "POST",
                    url:"add_Cal.php",
                    data: {'titre': TheFkTitle,'bgcolor':TheFkcolor,'date':info.dateStr,'allday':info.allDay},
                    success: function (data) {

                        console.log(data)
                    }
                });
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },
            eventResize: function(info) {
                console.log(info);
           //     alert(info.event.title + " end is now " + info.event.end.toISOString());
                  $.ajax({
                    type: "POST",
                    url:"resizeCal.php",
                    data: {'id': info.event.id,'dateEnd':info.event.end.toISOString().substring(0,(info.event.end.toISOString()).indexOf('T'))},
                    success: function (data) {

                        console.log(data)
                    }});
                /*
                if (!confirm("is this okay?")) {
                    info.revert();
                }*/
            },eventDrop: function(info) {

                // alert(info.event.title + " was dropped on " + info.event.start.toISOString()+"end"+info.event.end.toISOString());
                var xsd =new Date(info.event.start.toISOString().substring(0,(info.event.start.toISOString()).indexOf('T')));
                xsd=xsd.getFullYear()+'-'+(xsd.getMonth()+1)+'-'+(xsd.getDate()+1);

                $.ajax({
                    type: "POST",
                    url:"modifierCal.php",
                    data: {'id': info.event.id,'dateEnd':info.event.end.toISOString().substring(0,(info.event.end.toISOString()).indexOf('T')),'dateStart':xsd},
                    success: function (data) {

                        console.log(data)
                    }});

            }, eventClick: function(info) {
               // alert('Event: ' + info.event.id);

                // change the border color just for fun
                console.log(info);
           //     location.href="Modifevent.php?id="+info.event.id;
            },eventMouseEnter: function(info) {
                $('#information').show();
                $.ajax({
                    type: "GET",
                    url:"GethistoryByid.php",
                    data: {'id': info.event.id},
                    success: function (data) {
                        $('#information').html(data);

                    }});


            },eventMouseLeave: function(info) {
                $('#information').hide();
            },dateClick:function(info) {

                $('#choos').modal('show');
                $('#dateAdd').val(info.dateStr);
                $('#dateAddtwo').val(info.dateStr);
                $('#dateAddthree').val(info.dateStr);

               // alert('date: ' + );


            }


        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color'    : currColor
            })
        })
        $('#add-new-event').click(function (e) {
            e.preventDefault()
            //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color'    : currColor,
                'color'           : '#fff'
            }).addClass('external-event')

            event.html(val)
            $.ajax({
                type: "POST",
                url:"add_Session.php",
                data: {'titre': val,'bgcolor':event.css('background-color')},
                success: function (data) {

                    console.log('added!')
                }
            });

            $('#external-events').prepend(event)


            //Add draggable funtionality
            ini_events(event)

            //Remove event from text input
            $('#new-event').val('')
        });


    });
    $(document).ready(function() {

        $("#jls").click(function() {
            $("#choos").modal("hide");
            $("#exampleModal").modal("show");
        });
        $("#mhm").click(function() {
            $("#choos").modal("hide");
            $("#modalmahem").modal("show");
        });
        $("#mwid").click(function() {
            $("#choos").modal("hide");
            $("#modalmawaid").modal("show");
        });


    });


</script>

</body>
</html>
