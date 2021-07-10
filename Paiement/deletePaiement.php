<?php

include "../core/PaiementC.php";


$PaiementC = new PaiementC();

$PaiementC->supprimerPaiement($_GET['id']);

