<?php
include_once '../Entity/historiquecalendar.php';
include_once '../Core/historiquecalendarC.php';
$hist=new historiquecalendarC();
session_start();
$hi=$hist->gethistoryByid($_GET['id']);


$str='<div class="table-responsive"><table style="font-size: 13px;border-spacing: 15px; border: 2px solid purple;padding: 5px; "><thead style="background-color: purple;color: white"><th style="border: 1px solid purple;padding: 5px;">Agent</th style="border: 1px solid purple;padding: 5px;"><th>Modification</th><th style="border: 1px solid purple;padding: 5px;">D/H Modification</th></thead><tbody>';

foreach ($hi as $key){

   $str .='<tr style="border: 1px solid purple;padding: 5px;"><td style="border: 1px solid purple;padding: 5px;">'.$key['nom'].'</td><td style="border: 1px solid purple;padding: 5px;">'.$key['descriptionModif'].'</td><td style="border: 1px solid purple;padding: 5px;">'.$key['timemodif'].'</td></tr>';
}
$str .='</tbody></table></div>';

echo($str);

?>