<?php
include "../core/AgentC.php";
include "../Entity/Agent.php";

session_start();
if (!empty($_SESSION) && ($_SESSION['role'] == 'Admin')) {

    $AgentC = new AgentC();
    $Agent = new Agent($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['password'], $_POST['adresse']);
    $AgentC->update($Agent, $_POST['id']);
    header("location:AfficheAgent.php");
}
else{
    header('location:../Login.php');
}
?>

