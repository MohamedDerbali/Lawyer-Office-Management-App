<?php

include "../core/tribualC.php";
include "../Entity/tribual.php";

if(!isset($_SESSION)){
    session_start();

}
$tribual=new tribual($_POST['nom'],$_POST['addresse'],$_POST['categorie'],$_POST['tel'],$_POST['mail'],$_POST['gouvernorat'],$_POST['doyen']);
$tribualC=new tribualC();
$tribualC->ajouterTribual($tribual);
header("location:AfficheTribual.php");
?>
