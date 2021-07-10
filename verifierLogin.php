<?php

include "core/userC.php";
include "core/AgentC.php";
include "Entity/User.php";
if (isset($_POST['log'])  ){
    session_start();
 $userC=new userC();
 $AgentC=new AgentC();
 $Connecteduser= $userC->Login($_POST['email'],$_POST['pass']);
 $ConnectedAgent= $AgentC->Login($_POST['email'],$_POST['pass']);

  if(!empty($Connecteduser)){

    $_SESSION['id']=$Connecteduser['id'];
    $_SESSION['nom']=$Connecteduser['nom'];
    $_SESSION['prenom']=$Connecteduser['prenom'];
    $_SESSION['mail']=$Connecteduser['mail'];
    $_SESSION['password']=$Connecteduser['password'];
    $_SESSION['adresse']=$Connecteduser['adresse'];
    $_SESSION['role']='Admin';

      header('location:index.php');

  }
  else if(!empty($ConnectedAgent)) {
    $_SESSION['id']=$ConnectedAgent['id'];
    $_SESSION['nom']=$ConnectedAgent['nom'];
    $_SESSION['prenom']=$ConnectedAgent['prenom'];
    $_SESSION['mail']=$ConnectedAgent['mail'];
    $_SESSION['password']=$ConnectedAgent['password'];
    $_SESSION['adresse']=$ConnectedAgent['adresse'];
      $_SESSION['role']='Agent';
      $_SESSION['idAvocat']=$ConnectedAgent['idAdmin'];
      header('location:index.php');
  }
else{
    header('location:Login.php?flashmessage=verifier votre login et mot de passe !');
    }
}



?>
