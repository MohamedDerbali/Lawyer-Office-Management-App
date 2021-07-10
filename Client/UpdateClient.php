<?php
include "../core/ClientC.php";
include "../Entity/Client.php";

if(!isset($_SESSION)){
  session_start();

}

$CLientC=new ClientC();
$client=new Client($_POST['nom'],$_POST['prenom'],$_POST['identite'],$_POST['tel'],$_POST['mail'],$_POST['adresse'],$_POST['fix'],$_POST['datenaissance']);
  $CLientC->modifierClient($client,$_POST['id']);
  //header("location:AfficheClient.php");
?>

