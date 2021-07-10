<?php


include_once '../Entity/jugementcalendar.php';
include_once '../Core/jugementcalendarC.php';

$jdgServ=new JugementCalendarC();

$jdgServ->Dropjugementcalendar($_POST['dateStart'],$_POST['dateEnd'],$_POST['id']);
