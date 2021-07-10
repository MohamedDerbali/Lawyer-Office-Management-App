<?php
include_once '../Entity/jugementcalendar.php';
include_once '../Core/jugementcalendarC.php';

$jdgServ=new JugementCalendarC();

$jdgServ->modifierjugementcalendar($_POST['dateEnd'],$_POST['id']);
