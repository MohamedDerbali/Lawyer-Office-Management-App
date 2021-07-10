<?php

include "../core/ChargeC.php";


$Charge= new ChargeC();

$Charge->supprimerCharge($_GET['id']);

