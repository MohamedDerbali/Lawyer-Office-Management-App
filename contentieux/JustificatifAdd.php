<?php

include "../Core/justificatifC.php";
include "../Entity/justificatif.php";
$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['fil']['name']);




session_start();
if (!empty($_SESSION)) {

    if (move_uploaded_file($_FILES['fil']['tmp_name'], $uploadfile)) {
        echo 'uploaded';

    } else {
        echo "Upload failed";
    }


    $c = new justificatif($_POST['contentieux']+0, $_POST['libelle'], $_FILES['fil']['name'], $_POST['categorie']);




    $just = new justificatifC();
    $just->ajouterjust($c);


}
else{
    header('location:../Login.php');
}

?>
