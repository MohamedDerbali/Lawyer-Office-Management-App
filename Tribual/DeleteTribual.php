<?php

include "../core/tribualC.php";


$tribualC= new tribualC();

$tribualC->supprimerTribual($_GET['id']);
header("location:AfficheTribual.php");
