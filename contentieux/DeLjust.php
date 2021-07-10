<?php

include "../core/justificatifC.php";
include "../Entity/justificatif.php";


$C = new justificatifC();

$C->supprimerjust($_GET['id']);
echo 'removed';

