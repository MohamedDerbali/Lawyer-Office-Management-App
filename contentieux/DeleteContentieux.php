<?php

include "../core/CotentieuxC.php";
include "../Entity/Cotentieux.php";


$C = new CotentieuxC();

$C->supprimerContentieux($_GET['id']);
header('location:AfficherContentieux.php');

