<?php

include "../Core/CotentieuxC.php";
include "../Entity/Cotentieux.php";

session_start();
if (!empty($_SESSION)) {


    $c = new Cotentieux($_POST['idagent'], $_POST['idclient'], $_POST['categorie'], "en cours", $_POST['date'], $_POST['NumAffaire'], $_POST['objectif'], $_POST['idTribual'], $_POST['petition'], $_POST['sujet']);;



    $ContentieuxC = new CotentieuxC();

if(empty($ContentieuxC->getContentieuxByNumAffaire($_POST['NumAffaire'])))
    {$message= $ContentieuxC->ajouterContentieux($c);

    exit($message);}
else
{exit(0);}
}
else{
    header('location:../Login.php');
}

?>
