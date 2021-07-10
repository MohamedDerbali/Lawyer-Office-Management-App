<?php

include "../core/AgentC.php";
include "../Entity/Agent.php";

session_start();
if (!empty($_SESSION) && ($_SESSION['role'] == 'Admin')){

if (isset($_POST['addagent'])  ){
$agente=new Agent($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password'],$_POST['adresse']);
$agente->setIdAdmin($_SESSION['id']);
$agentC=new AgentC();
$agentC->ajouterAjent($agente);


}
header('location:AfficheAgent.php');


}
else{
    header('location:../Login.php');
}
?>

