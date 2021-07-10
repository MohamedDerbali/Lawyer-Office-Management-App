

<?php


if (!isset($_SESSION)) {
    session_start();
}

include_once 'Core/sessionC.php';
$obj=new sessionC();
$obj->Addsesssion($_POST['titre'],$_POST['bgcolor']);

?>