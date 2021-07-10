<?php

include "../core/ChargeC.php";
include "../Entity/Charge.php";
$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);



if (move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)) {
    echo 'uploaded';

} else {
    echo "Upload failed";
}
$c=new Charge($_POST['montant'],$_POST['etat'],$_POST['datecharge'],$_FILES['fichier']['name'],$_POST['idContentieux']);

$chargeC=new ChargeC();
$chargeC->updateCharge($c,$_POST['id']);

?>
