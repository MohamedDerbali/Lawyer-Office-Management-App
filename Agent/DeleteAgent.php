<?php

include "../core/AgentC.php";
session_start();
if (!empty($_SESSION) && ($_SESSION['role'] == 'Admin')){

$AgentC = new AgentC();

$AgentC->supprimerAgent($_GET['id']);
header("location:AfficheAgent.php");
}
else{
    header('location:../Login.php');
}