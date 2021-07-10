<?php

include_once "config.php";
class ColleguesC
{
    function recuperercolleugue(){
        $sql="SELECT * from collegues order by id ASC";
        $db = config::getConnexion();
        try{
            $sth = $db->prepare($sql);
            $sth->execute();
            $liste = $sth->fetchAll();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}