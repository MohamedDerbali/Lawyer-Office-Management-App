<?php

include "../core/RapportC.php";
include "../Entity/Rapport.php";

$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);



if (move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)) {
    echo 'uploaded';

} else {
    echo "Upload failed";
}
    $R=new Rapport($_POST['libelle'],$_FILES['fichier']['name'],$_POST['idcontentieux']);
    $RC=new RapportC();
    $RC->ajouterrapport($R);

?>
