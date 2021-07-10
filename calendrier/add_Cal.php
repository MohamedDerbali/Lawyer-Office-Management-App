<?php
include_once '../Entity/jugementcalendar.php';
include_once '../Entity/historiquecalendar.php';
include_once '../Core/jugementcalendarC.php';
include_once '../Core/historiquecalendarC.php';


if (!isset($_SESSION)) {
    session_start();
}

$jdgServ=new JugementCalendarC();
if($_POST['tpe']==0){

    $judgement=new jugementcalendar($_POST['titre'] ,$_POST['dateAdd'],$_POST['dateAdd'],$_POST['favcolor'],$_POST['lacontentieu'],$_POST['Adversaire'],$_POST['tpe'],null);
    if($_SESSION['role']=='Agent'){

    $judgement->setIdavocat($_SESSION['idAvocat']);

    }else{
        $judgement->setIdavocat($_SESSION['id']);
    }
    $judgement->setTribunal($_POST['Tribue']);
     $x=$jdgServ->addjugementcalendarjalasa($judgement);

}else if($_POST['tpe']==1)
{
    $judgement=new jugementcalendar($_POST['titre'] ,$_POST['dateAdd'],$_POST['dateAdd'],$_POST['favcolor'],null,null,$_POST['tpe'],$_POST['personalise']);
    if($_SESSION['role']=='Agent'){

        $judgement->setIdavocat($_SESSION['idAvocat']);

    }else{
        $judgement->setIdavocat($_SESSION['id']);
    }
    $x=$jdgServ->addjugementcalendar($judgement);

}
else
{
    $judgement=new jugementcalendar($_POST['titre'] ,$_POST['dateAdd'],$_POST['dateAdd'],$_POST['favcolor'],null,null,$_POST['tpe'],null);
    if($_SESSION['role']=='Agent'){

        $judgement->setIdavocat($_SESSION['idAvocat']);

    }else{
        $judgement->setIdavocat($_SESSION['id']);
    }
$judgement->setClientRendezvous($_POST['nomclient']);
    $x=$jdgServ->addjugementcalendarRendezvous($judgement);


}




if($_SESSION['role']=='Admin'){
    $hisJud=new historiquecalendar($x, null, $_SESSION['id'], 'no modifs');
}
else{
    $hisJud=new historiquecalendar($x, $_SESSION['id'], null, 'no modifs');
}
$His=(new historiquecalendarC())->ADDhistory($hisJud);
header('location:calendrier.php');