<?php

include "../core/RapportC.php";


$Rap=new RapportC();

$Rap->supprimerrapport($_GET['id']);

