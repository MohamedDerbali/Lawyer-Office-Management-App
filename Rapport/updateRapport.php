<?php

include "../Core/RapportC.php";
include "../Entity/Rapport.php";

$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);

var_dump($_GET['id']);

if (move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)) {
    echo 'uploaded';

} else {
    echo "Upload failed";
}
$R=new Rapport($_POST['libelle'],$_FILES['fichier']['name'],$_POST['idcontentieux']);
$RC=new RapportC();
$RC->modifierrapport($R,$_GET['id']);

?>
