<?php


include_once '../Entity/jugementcalendar.php';
include_once '../Entity/historiquecalendar.php';
include_once '../Core/jugementcalendarC.php';
include_once '../Core/historiquecalendarC.php';


if (!isset($_SESSION)) {
    session_start();
}


var_dump($_POST['start']);
$jdgServ=new JugementCalendarC();
$jdgServ->mettreajours($_POST['start'],$_POST['end'],$_GET['id']+0);
if($_SESSION['role']=='Admin'){
    $hisJud=new historiquecalendar($_GET['id']+0, null, $_SESSION['id'], 'il modifie la date');
}
else{
    $hisJud=new historiquecalendar($_GET['id']+0, $_SESSION['id'], null, 'il modifie la date');

}
$His=(new historiquecalendarC())->ADDhistory($hisJud);

header('location:Modifevent.php?id='.$_GET['id']);
?>