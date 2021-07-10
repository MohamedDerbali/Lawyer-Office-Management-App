<?php

include "../core/CotentieuxC.php";
include "../Entity/Cotentieux.php";
session_start();
$d=new \DateTime('now');
$c=new Cotentieux($_SESSION['id'],$_POST['idclient'],$_POST['categorie'],"en cours",$_POST['date'],$_POST['codeinterne'],$_POST['objectif'],$_POST['idTribual'],$_POST['petition'],$_POST['sujet']);

$ContentieuxC=new CotentieuxC();
$ContentieuxC->modifierContentieux($c,$_GET['id']);


header('location:AfficherContentieux.php');


?>
