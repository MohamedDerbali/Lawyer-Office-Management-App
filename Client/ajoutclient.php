<?php

include "../core/ClientC.php";
include "../Entity/Client.php";


$client=new Client($_POST['nom'],$_POST['prenom'],$_POST['identite'],$_POST['tel'],$_POST['mail'],$_POST['adresse'],$_POST['fix'],$_POST['dateNaissance']);
$clientC=new ClientC();

if(empty($clientC->getClientbyCin($_POST['identite'])))

{$message= $clientC->ajouterClient($client);
    exit($message);
}
else
{exit(0);}


?>