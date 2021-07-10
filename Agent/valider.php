<?php

session_start();
include "../core/AgentC.php";
include "../Entity/Agent.php";
$agentC=new AgentC();
$agentC->changestat($_GET['id']);
header('location:AfficheMission.php');
?>