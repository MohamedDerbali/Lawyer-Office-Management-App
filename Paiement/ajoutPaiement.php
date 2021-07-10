<?php

include "../core/PaiementC.php";
include "../Entity/Paiement.php";
$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);



if (move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)) {
    echo 'uploaded';

} else {
    echo "Upload failed";
}
$p=new Paiement($_POST['titre'],$_POST['dateth'],$_POST['modalite'],"non paye",$_POST['datePr'],$_FILES['fichier']['name'],$_POST['idContentieux'],$_POST['montant']);
var_dump($p);
$PaiementC=new PaiementC();
$PaiementC->ajouterAjent($p);

?>
