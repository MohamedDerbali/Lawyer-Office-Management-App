<?php
session_start();
include "../core/AgentC.php";
include "../Entity/Agent.php";
if($_POST['Addmission']){
    var_dump($_POST['Agent']);

    $string = trim( $_POST['mission']);
    var_dump($string);
    $agentC=new AgentC();
    $agentC->Mission($_SESSION['id'],$_POST['Agent'],$_POST['mission']);

}
header('location:AfficheMission.php');

?>