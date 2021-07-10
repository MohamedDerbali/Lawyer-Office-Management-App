<?php
include "../core/tribualC.php";
include "../Entity/tribual.php";


$tribual=new tribual($_POST['nom'],$_POST['ville']);
$tribualC=new tribualC();
$tribualC->updateTribual($tribual,$_POST['id']);

?>

