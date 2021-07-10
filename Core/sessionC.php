<?php
include_once "config.php";


class sessionC
{
    function Addsesssion($title,$color){
        $sql="insert into session (nom, color) values(:title,:color)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);


            $req->bindValue(':title',$title);
            $req->bindValue(':color',$color);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }

    function AllSession(){
        $sql="select * From session";
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