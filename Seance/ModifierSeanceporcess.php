<?php

include "../core/seanceC.php";
include "../Entity/seance.php";

$S=new seance($_POST['libelle'],$_POST['date'],$_POST['lieux'],$_POST['idContentieux']);
$SC=new seanceC();
$SC->modifiersc($S,$_GET['id']);

?>
