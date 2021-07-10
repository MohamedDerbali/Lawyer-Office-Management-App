<?php

include "../core/ClientC.php";
include "../Entity/Client.php";

if(!isset($_SESSION)){
    session_start();

}

$CLientC = new ClientC();

$CLientC->supprimerClient($_GET['id']);
header("location:AfficheClient.php");
